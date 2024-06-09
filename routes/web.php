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
Route::get('/platinum/profile', [UserProfileController::class,'show'])->name('platinum.profile');
Route::put('/platinum/profile', [UserProfileController::class, 'update'])->name('platinum.profile.update');

//Route::get('/platinum/profile/{RegID}/edit', [UserProfileController::class,'editPlatinumProfile'])->name('platinum.profile.edit');
//Route::put('/platinum/update/{RegID}', [UserProfileController::class,'updatePlatinumProfile'])->name('platinum.profile.update');

//Module 2 (Expert)
Route::get('/Expert', [ExpertController::class, 'expertView'])->name('expertView');


//Module 3 (Publication)
Route::resource('/Publication', PublicationController::class);
Route::get('/Publication', [PublicationController::class, 'landingpublication'])->name('Publication.landingpublication');
Route::get('/listpublication', [PublicationController::class, 'showList'])->name('Publication.showList');
Route::get('/uploadpublication', [PublicationController::class, 'showUpload'])->name('Publication.showUpload');
Route::post('/uploadpublication', [PublicationController::class, 'upload'])->name('Publication.store');
Route::get('/deletepublication', [PublicationController::class, 'showDelete'])->name('Publication.showDelete');
Route::delete('/Publication/destroy', [PublicationController::class, 'destroy'])->name('Publication.destroy');
Route::get('/editpublication', [PublicationController::class, 'showEdit'])->name('Publication.showEdit');
Route::get('/editpublication/{id}', [PublicationController::class, 'edit'])->name('Publication.edit');
Route::post('/editpublication/{id}', [PublicationController::class, 'update'])->name('Publication.update');
Route::get('/viewpublication/{id}', [PublicationController::class, 'view'])->name('Publication.view');
Route::get('/searchpublication', [PublicationController::class, 'showSearch'])->name('Publication.search');


