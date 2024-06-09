<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class UserProfileController extends Controller
{
    public function show()
    {
        $platinumProfile = session('platinum');

        if (!$platinumProfile) {
            return redirect()->back()->with('error', 'Profile ID not found in session.');
        }

        $id = $platinumProfile;
        $registration = Registration::where('RegID', $id)->first();

        if (!$registration) {
            return redirect()->back()->with('error', 'User not found.');
        } else {
            return view('profile.Platinum.viewPlatinumProfilePage', ['registration' => $registration]);
        }
    }

    public function edit()
    {
        $platinumProfile = session('platinum');

        if (!$platinumProfile) {
            return redirect()->back()->with('error', 'Profile ID not found in session.');
        }

        $id = $platinumProfile;
        $registration = Registration::where('RegID', $id)->first();

        if (!$registration) {
            return redirect()->back()->with('error', 'User not found.');
        } else {
            return view('profile.Platinum.EditandUpdateProfiles', ['registration' => $registration]);
        }
    }

    public function update(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'R_Title' => 'required|string|max:255',
            'R_FullName' => 'required|string|max:255',
            'R_Address' => 'required|string|max:255',
            'R_PhoneNum' => 'required|string|max:20',
            'R_Email' => 'required|email|max:255',
            'R_FbName' => 'nullable|string|max:255',
            'R_EduInstitute' => 'nullable|string|max:255',
        ]);

        $platinumProfile = session('platinum');

        // Find the registration record in the database
        $registration = Registration::where('RegID', $platinumProfile)->first();

        // If registration record not found, redirect back with error
        if (!$registration) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Update the registration data with validated data
        $registration->update($validatedData);

        // Redirect back to profile page with success message
        return redirect()->route('platinum.profile')->with('success', 'Profile updated successfully!.');
    }

        public function search(Request $request)
    {
        $searchName = $request->input('searchName');

        // Fetch profiles that match the search name
        $profiles = Registration::where('R_FullName', 'LIKE', '%' . $searchName . '%')->get();

        return view('profile.Platinum.viewOthersPlatinumProfilePage', ['profiles' => $profiles]);
    }

    public function viewProfile($id)
    {
        $registration = Registration::find($id);

        if (!$registration) {
            return redirect()->route('platinum.search')->with('error', 'Profile not found.');
        }

        return view('profile.Platinum.viewPlatinumProfilePage', ['registration' => $registration]);
    }

    public function viewOtherProfile($id)
    {
        $registration = Registration::find($id);
    
        if (!$registration) {
            return redirect()->route('platinum.search')->with('error', 'Profile not found.');
        }
    
        return view('profile.Platinum.viewOtherProfile', ['registration' => $registration]);
    }

}