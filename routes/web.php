<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\UserProfileController;

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
Route::get('/ResetPassword', [ResetPasswordController::class, 'ResetPasswordPage']);

//Module 1 (Register)
Route::get('/Register-page', [RegisterController::class, 'index'])->name('Register.index');
Route::get('/Register', [RegisterController::class, 'registerPage'])->name('Register.RegisterPage');
Route::post('/Register-page', [RegisterController::class, 'store'])->name('Register.store');
Route::get('/Register-page/{id}', [RegisterController::class, 'show'])->name('Register.show');

//Module 1 (UserProfile)
Route::get('/UserProfile', [UserProfileController::class, 'UserProfilePage']);

//Module 2 (Expert)
Route::get('/Expert', [ExpertController::class, 'expertView']);


//Module 3 (Publication)
Route::get('/Publication', [PublicationController::class, 'publicationView']);