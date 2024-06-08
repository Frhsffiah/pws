<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function viewProfile()
    {
        $mentor = Mentor::where('UserID', Auth::id())->first();
        return view('profile.Mentor.viewMentorProfilePage', compact('mentor'));
    }

    public function editProfile(Request $request)
    {
        $mentor = Mentor::where('UserID', Auth::id())->first();
        return view('profile.Mentor.EditandUpdateProfile', compact('mentor'));
    }

    public function updateProfile(Request $request)
    {
        $mentor = Mentor::where('UserID', Auth::id())->first();

        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'ic_no' => 'required|string|max:20',
            'gender' => 'required|string|max:10',
            'no_phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $mentor->update([
            'fullname' => $request->input('fullname'),
            'ic_no' => $request->input('ic_no'),
            'gender' => $request->input('gender'),
            'phone_no' => $request->input('phone_no'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('viewMentorProfile');
    }

}
