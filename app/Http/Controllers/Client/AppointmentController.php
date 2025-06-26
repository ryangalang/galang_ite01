<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendAppointmentEmail;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    /**
     * Display a listing of appointments.
     */
    public function index()
    {
        $appointments = Appointment::with('student')->get();

        return view('client.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new appointment.
     */
    public function create()
    {
        $students = Student::all();

        return view('client.appointments.create', compact('students'));
    }

    /**
     * Store a newly created appointment in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id'       => 'required|exists:students,id',
            'title'            => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'status'           => 'required|in:Pending,Completed',
            'remarks'          => 'nullable|string',
        ]);

        $student_id = $request->input('student_id');

        // Create appointment first
        $appointment = Appointment::create($request->all());

        // Find the student to send email
        $student = Student::find($student_id);

        // Format the schedule date & time nicely
        $schedule_date = Carbon::parse($request->input('appointment_date'))->format('d, F, Y') . ' ' .
                         Carbon::parse($request->input('appointment_time'))->format('h:i A');

        // Send mail only if student and email exists
        if ($student && $student->email) {
            Mail::to($student->email)->send(new SendAppointmentEmail($student, $schedule_date));
        }

        return redirect()->route('appointments.index')
                         ->with('success', 'Appointment created successfully.');
    }

    /**
     * Show the form for editing the specified appointment.
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $students = Student::all();

        return view('client.appointments.edit', compact('appointment', 'students'));
    }

    /**
     * Update the specified appointment in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id'       => 'required|exists:students,id',
            'title'            => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'status'           => 'required|in:Pending,Completed',
            'remarks'          => 'nullable|string',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());

        return redirect()->route('appointments.index')
                         ->with('success', 'Appointment updated successfully.');
    }

    /**
     * Remove the specified appointment from storage.
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        if (request()->ajax()) {
            return response()->json(['success' => 'Appointment deleted successfully']);
        }

        return redirect()->route('appointments.index')
                         ->with('success', 'Appointment deleted successfully.');
    }
}
