<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class OtpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the OTP entry form.
     */
    public function index()
    {
        return view('auth.otp');
    }

    /**
     * Handle OTP submission and verification.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'one_time_password' => 'required',
            ],
            [
                'one_time_password.required' => 'One time password field is required.',
            ]
        );

        $user = User::find(auth()->id());

        if (!$user) {
            
            return redirect()->back()->with('error', 'User not found.');
        }

        if ($user->otp_number == $request->input('one_time_password')) {
            $user->otp_number = null;
            $user->save();

            return redirect()->route('home');
        }

        return redirect()->back()->with('error', 'Invalid one time password.');
    }
}
