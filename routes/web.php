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
Route::get('/Login', [LoginController::class, 'LoginPage'])->name('LoginPage');
Route::get('/ForgotPassword', [LoginController::class, 'ForgotPasswordPage'])->name('forgotPassword');
Route::get('/ResetPassword', [ResetPasswordController::class, 'ResetPasswordPage'])->name('resetPassword');

//Module 1 (Register will be update)
Route::get('/Register-list', [RegisterController::class, 'list'])->name('registers.list'); //mentor: list of register
Route::get('/Registers-page/{RegID}', [RegisterController::class, 'show2'])->name('registers.show2');

Route::get('/Register-page/create', [RegisterController::class, 'create'])->name('registers.create');
Route::post('/Register-page/create', [RegisterController::class, 'store'])->name('registers.store');
Route::get('/listRegistration', [RegisterController::class, 'index'])->name('registers.index'); //staff: list of register
Route::get('/Register-page/{RegID}', [RegisterController::class, 'show'])->name('registers.show');

Route::post('/Login', [LoginController::class, 'LoginPost'])->name('LoginPost');
Route::get('/Login', [LoginController::class, 'loginPage'])->name('loginPage');
Route::get('/PlatinumPage', [LoginController::class, 'platinumPage'])->name('PlatinumPage');
Route::get('/StaffPage', [LoginController::class, 'staffPage'])->name('StaffPage');
Route::get('/MentorPage', [LoginController::class, 'mentorPage'])->name('mentorPage');
Route::get('/userForm', [LoginController::class, 'userForm'])->name('userForm');
Route::post('/userRegister', [LoginController::class, 'userPost'])->name('userPost');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Module 1 (UserProfile)
Route::get('/mentor/profile', [UserProfileController::class, 'viewProfile'])->name('viewMentorProfile');
Route::get('/mentor/profile/edit', [UserProfileController::class, 'editProfile'])->name('editMentorProfile');
Route::post('/mentor/profile/update', [UserProfileController::class, 'updateProfile'])->name('updateMentorProfile');

//Module 2 (Expert)
Route::get('/Expert', [ExpertController::class, 'expertView'])->name('expertView');


//Module 3 (Publication)
Route::get('/Publication', [PublicationController::class, 'publicationView']);
Route::get('/listpublication', [PublicationController::class, 'showList'])->name('listpublication');

