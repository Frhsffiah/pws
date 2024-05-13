<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

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

Route::get('/Login', [LoginController::class, 'LoginPage']);
Route::get('/ForgotPassword', [ForgotPasswordController::class, 'ForgotPasswordPage']);
Route::get('/ResetPassword', [ResetPasswordController::class, 'ResetPasswordPage']);