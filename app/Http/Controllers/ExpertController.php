<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function expertView()
    {
        return view ('expert.expertView');
    }
}