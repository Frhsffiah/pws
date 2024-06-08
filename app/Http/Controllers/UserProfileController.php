<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{

    public function show()
    {
        $platinumProfile = session('platinum');
     
        if (!$platinumProfile) {
            return redirect()->back()->with('error', 'Profile ID not found in session.');
        }
     
        $id = $platinumProfile;
        $registration = Registration::where('RegID', $id)->first(); // Fetch the data
     
        if (!$registration) {
            return redirect()->back()->with('error', 'User not found.');
        } else {
            // Pass the data to the view
            return view('profile.Platinum.EditandUpdateProfile', ['registration' => $registration]);
        }
    }
    
    public function update(Request $request)
    {
        // Add validation if needed
        $validatedData = $request->validate([
            // Validation rules
        ]);

        $platinumProfile = session('platinum');
        if (!$platinumProfile) {
            return redirect()->back()->with('error', 'Profile ID not found in session.');
        }

        $id = $platinumProfile;
        $registration = Registration::where('RegID', $id)->first();

        if (!$registration) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Update the registration data
        $registration->update($validatedData);

        return redirect()->route('platinum.profile')->with('success', 'Profile updated successfully.');
    }

}
