<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\SetupController;
use \App\Http\Controllers\ValidationController;
use \App\Http\Controllers\Admin\EmailController as AdminEmailController;
use \App\Http\Controllers\Admin\UserController as  AdminUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HelpCenterController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::group(['middleware' => 'https'], function () {

Route::get('/', [LoginController::class, 'showLoginForm']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/setup', [SetupController::class, 'index'])->name('setup');

Route::resource('faqs', FaqController::class);

Route::group(['middleware' => ['auth', 'block']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('companies/{id}/verification', [CompanyController::class, 'verification']);
    Route::resource('companies', CompanyController::class);

    Route::get('banks/{id}/verification', [BankController::class, 'verification']);
    Route::resource('banks', BankController::class);

    Route::post('/profile', [SettingController::class, 'updateProfile'])->name('profile.update');
    Route::get('/profile', [SettingController::class, 'profile'])->name('profile.index');

    // generate otp
    Route::get('/generate-otp/{user_id?}', OtpController::class);
});

Route::group(['middleware' => ['auth', 'user', 'block']], function () {
    // Help Center
    Route::match(['get', 'post'], '/help-center', HelpCenterController::class)->name('help-center');
});

Route::group(['middleware' => ['auth', 'admin', 'block'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/email-create/{id}', [AdminEmailController::class, 'create'])->name('email.create');
    Route::post('/email-send', [AdminEmailController::class, 'send'])->name('email.send');

    Route::get('/users/{userId}/messages', [AdminEmailController::class, 'index'])->name('users.messages.index');
    Route::post('/users/{userId}/messages', [AdminEmailController::class, 'store'])->name('users.messages.store');

    Route::get('/users/{id}/verify', [AdminUserController::class, 'verify'])->name('users.verify');
    Route::get('/users/{id}/unverify', [AdminUserController::class, 'unverify'])->name('users.unverify');
    Route::get('/users/{id}/delete', [AdminUserController::class, 'destroy'])->name('users.delete');
    Route::get('/users/{id}/block', [AdminUserController::class, 'block'])->name('users.block');

    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');

    Route::get('faqs', [FaqController::class, 'adminIndex'])->name('admin.faqs.index');
});
// });
