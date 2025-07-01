<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;  // <-- Import the User model here

class OtpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.otp');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'one_time_password' => 'required',
            ],
            [
                'one_time_password.required' => 'The OTP field is required.',
            ]
        );

        $user_id = auth()->user()->id;
        $user = User::find($user_id); 

        if ($user && $user->otp_number === $request->input('one_time_password')) {
            $user->otp_number = null;
            $user->save();

            return redirect()->to('home');
        }

        return redirect()->back()->with('error', 'Invalid one time password');
    }

    // Other methods here...
}
