<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the profile resource.
     */
    public function index()
    {
        
        return view('client.profile.index');
    }

    /**
     * Show the form for creating a new profile.
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
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        

        return redirect()->route('profile.index')->with('success', 'Profile created successfully.');
    }

    /**
     * Display the specified profile.
     */
    public function show($id)
    {
        // Example: Fetch profile by ID and pass to view
        // $profile = Profile::findOrFail($id);
        // return view('client.profile.show', compact('profile'));

        return view('client.profile.show');
    }

    /**
     * Show the form for editing the specified profile.
     */
    public function edit($id)
    {
        // $profile = Profile::findOrFail($id);
        // return view('client.profile.edit', compact('profile'));

        return view('client.profile.edit');
    }

    /**
     * Update the specified profile in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // $profile = Profile::findOrFail($id);
        // $profile->update($request->all());

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified profile from storage.
     */
    public function destroy($id)
    {
        // $profile = Profile::findOrFail($id);
        // $profile->delete();

        return redirect()->route('profile.index')->with('success', 'Profile deleted successfully.');
    }
}
