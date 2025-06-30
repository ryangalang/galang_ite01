<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Profile; // Uncomment if using a Profile model
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function index()
    {
        $user = Auth::user();
        return view('client.profile.index', compact('user'));
    }

    /**
     * Show the form for creating a new profile (optional).
     */
    public function create()
    {
        return view('client.profile.create');
    }

    /**
     * Store a newly created profile in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        // Profile::create($request->all()); // For profile table

        return redirect()->route('profile.index')->with('success', 'Profile created successfully.');
    }

    /**
     * Display the specified profile.
     */
    public function show($id)
    {
        // $profile = Profile::findOrFail($id);
        return view('client.profile.show'); // , compact('profile')
    }

    /**
     * Show the form for editing the profile.
     */
    public function edit($id)
    {
        $user = Auth::user();

        return view('client.profile.edit', compact('user'));
    }

    /**
     * Update the user's profile.
     */
    public function update(Request $request, $id)
    {
        $request->validate(
        [
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
        ] 
    );

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if($request->has('photo') && $request->file('photo')->isValid()) {
            $photo = $request->file('photo');
            $originalName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $extension =$photo->getClientOriginalExtension();

            $photo_name =$originalName . '-' . time() . '-' . $extension;
            $path =$request->file('photo')->storeAs('photos', $photo_name, 'public');
            $user->photo = $path;

        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified profile from storage.
     */
    public function destroy($id)
    {
        // Profile::findOrFail($id)->delete();
        return redirect()->route('profile.index')->with('success', 'Profile deleted successfully.');
    }
}