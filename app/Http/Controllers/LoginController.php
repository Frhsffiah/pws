<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view('login.login_page');
    }


    public function forgotPasswordPage()
    {
        return view('login.forgot_password_page');
    }

    public function platinumPage()
    {
        return view('components.platinumLayout');
    }

    public function staffPage()
    {
        return view('components.staffLayout');
    }

    public function mentorPage()
    {
        return view('components.mentorLayout');
    }

    public function userForm()
    {
        return view ('registration.Mentor.userRegister');
    }

    public function userPost(Request $request)
     {
         // Validation
         $validatedData = $request->validate([
             'password' => 'required',
             'role' => 'required',
             'email' =>'required',
         ]);
     
         $user = new users();
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->password = Hash::make($request->input('password'));

        if ($user->save()) {
            return redirect()->route('userForm')->with('success', 'User registered successfully.');
        } else {
            return redirect()->route('userForm')->with('error', 'Failed to register user.');
        }
     }

     public function loginPost(Request $request)
     {
         $request->validate([
             'email' => 'required|email',
             'password' => 'required',
             'user' => 'required',
         ]);
     
         $email = $request->input('email');
         $password = $request->input('password');
         $role = $request->input('user');
     
         $authenticated = false;
         $user = null;
     
         if ($role == 'platinum') {
             if ($this->manualPlatinumAuth($email, $password)) {
                 $user = Registration::where('R_Email', $email)->first();
                 $this->manualLogin('platinum', $user);
     
                 return redirect()->route('PlatinumPage');
             } else {
                 return redirect()->back()->withErrors(['Invalid credentials']);
             }
         } elseif ($role == 'mentor') {
             if ($this->manualMentorAuth($email, $password)) {
                 $user = users::where('email', $email)->first();
                 $this->manualLogin('mentor', $user);
     
                 return redirect()->route('mentorPage');
             } else {
                 return redirect()->back()->withErrors(['Invalid credentials']);
             }
         } elseif ($role == 'staff') {
             if ($this->manualStaffAuth($email, $password)) {
                 $user = users::where('email', $email)->first();
                 $this->manualLogin('staff', $user);
     
                 return redirect()->route('StaffPage');
             } else {
                 return redirect()->back()->withErrors(['Invalid credentials']);
             }
         } else {
             return redirect()->back()->withErrors(['Invalid role']);
         }
     }
     
    private function manualPlatinumAuth($R_Email, $password)
    {
        $user = Registration::where('R_Email', $R_Email)->first();
        if ($user && Hash::check($password, $user->password)) {
            return true;
        }
        return false;
    }

    private function manualStaffAuth($email, $password)
    {
        $user = users::where('email', $email)->first();
        if($user && Hash::check($password, $user->password)){
            return true;
        }
        return false;
    }

    private function manualMentorAuth($email, $password)
    {
        $user = users::where('email', $email)->first();
        if($user && Hash::check($password, $user->password)){
            return true;
        }
        return false;
    }
    

    private function manualLogin($role, $user)
    {
        if ($role == 'staff') {
            session(['staff' => $user->Staff_ID]);
        } elseif ($role == 'mentor') {
            session(['mentor' => $user->Mentor_ID]);
        } elseif ($role == 'platinum') {
            session(['platinum' => $user->RegID, 'platinum' => $user->R_FullName]);
        }
    }

    private function manualCheck($role)
    {
        dd($role, session()->all());
        
        if ($role == 'staff') {
            return session()->has('staff');
        } elseif ($role == 'mentor') {
            return session()->has('mentor');
        } elseif ($role == 'platinum') {
            return session()->has('platinum');
            
        }

        return false;
    }



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/Login')->with('success', 'You have been logged out.');
    }
}
