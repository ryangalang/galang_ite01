<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Jobs\SendAppointmentEmailJob;
use App\Models\Appointment;
use App\Models\Student;
use Illuminate\Http\Request;
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
        $appointment = Appointment::create($request->only([
            'student_id',
            'title',
            'appointment_date',
            'appointment_time',
            'status',
            'remarks',
        ]));

        // Find the student to send email
        $student = Student::find($student_id);

        // Format the schedule date & time nicely
        $schedule_date = Carbon::parse($request->input('appointment_date'))->format('d, F, Y') . ' ' .
                         Carbon::parse($request->input('appointment_time'))->format('h:i A');

        // Send mail only if student and email exists
        if ($student && $student->email) {
            // Dispatch job with 5 seconds delay
            SendAppointmentEmailJob::dispatch($student, $schedule_date)->delay(now()->addSeconds(5));
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
        $appointment->update($request->only([
            'student_id',
            'title',
            'appointment_date',
            'appointment_time',
            'status',
            'remarks',
        ]));

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
