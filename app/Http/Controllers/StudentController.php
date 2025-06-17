<?php

namespace App\Http\Controllers;


use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        //$data['students'] = [
        //['name' => 'Juan Dela Cruz'],
        //['name' => 'Ryan Galang'],
        //['name' => 'Superman']

    //];
        $data['students'] = Student::orderBy('created_at', 'desc')->paginate(15);
        $data['isAdmin'] = true;
        $data['user'] = "Ryan Galang";
        return view ('students', $data);
    }
    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        Student::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'email' => $request['email'],
            'contact_number' => $request['contact_number'],
        ]);

        return redirect()->to('students');   
    }
    public function edit($id)
    {
        return "The id is $id";
    }
    public function update(Request $request, $id)
    {
        
    }
    public function show($id)
    {
        return  "Show id $id";
    }
    public function destroy($id)
    {

    }
}
