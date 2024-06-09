<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view('login.login_page');
    }

    public function showForgotPasswordForm()
    {
        return view('login.forgot_password_page');
    }

    public function handleForgotPassword(Request $request)
{
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? response()->json(['status' => __($status)], 200)
        : response()->json(['error' => __($status)], 400);
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
        return view('registration.Mentor.userRegister');
    }

    public function userPost(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'password' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        try {
            Users::create([
                'password' => Hash::make($validatedData['password']),
                'role' => $validatedData['role'],
                'email' => $validatedData['email'],
            ]);

            return redirect()->route('userForm')->with('success', 'User registered successfully.');
        } catch (\Exception $e) {
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

        if ($role == 'platinum') {
            if ($this->manualPlatinumAuth($email, $password)) {
                $user = Registration::where('R_Email', $email)->first();
                $this->manualLogin('platinum', $user);
                return redirect()->route('PlatinumPage');
            }
        } elseif ($role == 'mentor') {
            if ($this->manualMentorAuth($email, $password)) {
                $user = Users::where('email', $email)->first();
                $this->manualLogin('mentor', $user);
                return redirect()->route('mentorPage');
            }
        } elseif ($role == 'staff') {
            if ($this->manualStaffAuth($email, $password)) {
                $user = Users::where('email', $email)->first();
                $this->manualLogin('staff', $user);
                return redirect()->route('StaffPage');
            }
        }

        return redirect()->back()->withErrors(['Invalid credentials or role']);
    }

    private function manualPlatinumAuth($R_Email, $password)
    {
        $user = Registration::where('R_Email', $R_Email)->first();
        return $user && Hash::check($password, $user->password);
    }

    private function manualStaffAuth($email, $password)
    {
        $user = Users::where('email', $email)->first();
        return $user && Hash::check($password, $user->password);
    }

    private function manualMentorAuth($email, $password)
    {
        $user = Users::where('email', $email)->first();
        return $user && Hash::check($password, $user->password);
    }

    private function manualLogin($role, $user)
    {
        if ($role == 'staff') {
            session(['staff' => $user->Staff_ID]);
        } elseif ($role == 'mentor') {
            session(['mentor' => $user->Mentor_ID]);
        } elseif ($role == 'platinum') {
            session(['platinum' => $user->RegID]);
        }
    }

    private function manualCheck($role)
    {
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
    
        return redirect('/Login')->with('success', 'You have been logged out.');
    }

    
}
