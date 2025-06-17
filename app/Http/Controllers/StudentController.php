<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $data['students'] = [
        ['name' => 'Juan Dela Cruz'],
        ['name' => 'Ryan Galang'],
        ['name' => 'Superman']
    ];
    $data['isAdmin'] = true;
    $data['user'] = "Ryan";
    return view ('students', $data);
    }
}
