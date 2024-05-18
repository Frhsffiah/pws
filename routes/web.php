<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Module 1 (Login)
Route::get('/Login', [LoginController::class, 'LoginPage']);
Route::get('/ForgotPassword', [LoginController::class, 'ForgotPasswordPage']);
Route::get('/ResetPasswordPassword', [ResetPasswordController::class, 'ResetPasswordPage']);

//Module 1 (Register)
Route::get('/Register', [RegisterController::class, 'RegisterPage']);

//Module 2 (Expert)
Route::get('/Expert', [ExpertController::class, 'expertView']);