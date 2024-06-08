<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{

    public function show()
    {
        $platinumProfile = session('platinum');
     
        if (!$platinumProfile || !isset($platinumProfile['RegID'])) {
            return redirect()->back()->with('error', 'Profile ID not found in session.');
        }
     
        $id = $platinumProfile['RegID'];
        $registration = Registration::where('RegID', $id)->first(); // Fetch the data
     
        if (!$registration) {
            return redirect()->back()->with('error', 'User not found.');
        } else {
            // Pass the data to the view
            return view('profile.Platinum.EditandUpdateProfile', ['registration' => $registration]);
        }
    }
    
    
}