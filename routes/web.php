<?php

use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileUserController;
use Illuminate\Support\Facades\Route;

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
    return view('homepage');
});

/* Profile user route */
Route::prefix('account')->group(function () {
    // Personal info
    Route::get('/', [ProfileUserController::class, 'edit'])->name('profile.edit');
    Route::put('/', [ProfileUserController::class, 'update'])->name('profile.update');
    // Password
    Route::get('/password', [PasswordController::class, 'edit'])->name('password.edit');
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
});
