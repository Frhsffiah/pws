<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public  function ResetPasswordPage()
    {
        return view('login.reset_password_page');
    }
}
