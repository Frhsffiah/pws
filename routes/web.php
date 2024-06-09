<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ReportController;

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

Route::get('/forgot-password', [LoginController::class, 'showForgotPasswordForm'])->name('forgotPassword');
Route::post('/forgot-password', [LoginController::class, 'handleForgotPassword'])->name('handleForgotPassword');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('showResetPasswordForm');
Route::post('/reset-password', [ResetPasswordController::class, 'handleResetPassword'])->name('handleResetPassword');


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


Route::middleware('auth')->group(function () {
Route::get('/reports/generate', [ReportController::class, 'showGenerateReportForm'])->name('reports.generate.form');
Route::post('/reports/generate', [ReportController::class, 'generateReport'])->name('reports.generate');
});
 

//Module 1 (UserProfile)
Route::get('/platinum/profile', [UserProfileController::class,'show'])->name('platinum.profile');
Route::put('/platinum/profile', [UserProfileController::class, 'update'])->name('platinum.profile.update');
Route::get('/platinum/profile/edit', [UserProfileController::class, 'edit'])->name('platinum.profile.edit');
Route::get('/platinum/search', [UserProfileController::class, 'search'])->name('platinum.search');
Route::get('/platinum/profile/{id}', [UserProfileController::class, 'viewProfile'])->name('platinum.profile.view');
Route::get('/platinum/profile/view/{id}', [UserProfileController::class, 'viewOtherProfile'])->name('platinum.other.view');





//Module 2 (Expert)
Route::get('/Expert', [ExpertController::class, 'expertView'])->name('expertView');


//Module 3 (Publication)
Route::get('/Publication', [PublicationController::class, 'landingpublication'])->name('Publication.landingpublication');
Route::get('/listpublication', [PublicationController::class, 'showList'])->name('Publication.showList');
Route::get('/uploadpublication', [PublicationController::class, 'showUpload'])->name('Publication.showUpload');
Route::post('/uploadpublication', [PublicationController::class, 'upload'])->name('Publication.store');
Route::get('/searchpublication', [PublicationController::class, 'showSearch'])->name('Publication.search');


