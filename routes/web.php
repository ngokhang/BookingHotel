<?php

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\User\ProfileUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;

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

Route::get('/', function () {
    return view('home');
});

/* Reset password */
// Route::prefix('reset-password', function () {
//     Route::get('/', [ResetPasswordController::class, 'index'])->name('resetpass.index');
// });

Route::prefix('forgot-password')->group(function () {
    Route::get('/', [ForgotPasswordController::class, 'create'])->name('forgot.create');
    Route::post('/', [ForgotPasswordController::class, 'store'])->name('forgot.store');
});

Route::prefix('reset-password')->group(function () {
    Route::get('/{email}', [NewPasswordController::class, 'edit'])->name('reset_pass.edit');
    Route::post('/{token}', [NewPasswordController::class, 'update'])->name('reset_pass.update');
});


/* Profile user route */
Route::prefix('account')->group(function () {
    // Personal info
    Route::get('/', [ProfileUserController::class, 'index'])->name('profile.index');
    Route::get('/personal', [ProfileUserController::class, 'edit'])->name('profile.edit');
    Route::put('/', [ProfileUserController::class, 'update'])->name('profile.update');
    // Password
    Route::get('/password', [PasswordController::class, 'edit'])->name('password.edit');
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
});
// trang chủ
Route::get('/', [HomeController::class, 'index']);
//trang tìm kiếm
Route::get('/search', [SearchController::class, 'index'])->name('search');
