<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public  function LoginPage()
    {
        return view('login.login_page');
    }

    public  function ForgotPasswordPage()
    {
        return view('login.forgot_password_page');
    }
}
