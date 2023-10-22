<?php

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\User\ProfileUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\User\UserBookingController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingListController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\OwnerManageBookingController;

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

// Route::get('/', function () {
//     return view('home');
// });

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
    Route::put('/{id}', [ProfileUserController::class, 'update'])->name('profile.update');
    // Password
    Route::get('/password', [PasswordController::class, 'edit'])->name('password.edit');
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
    // Booking
    Route::get('/your-booking', [UserBookingController::class, 'index'])->withTrashed()->name('booking.index');
    Route::delete('your-booking/{booking_id}', [UserBookingController::class, 'destroy'])->name('booking.destroy');
});

// Evalution hotel
Route::post('hotel-review/{hotel_id}', [UserBookingController::class, 'update'])->name('hotel.eval');

// trang chủ
// Route::get('/', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index'])->name('home');
//trang tìm kiếm
Route::get('/search', [SearchController::class, 'index'])->name('search');
//trang chi tiết thông tin phòng
Route::get('/hotel/{id}', [HotelController::class, 'show'])->withTrashed()->name('hotel.show');
//trang đặt phòng
// Route::post('/booking/create/{hotel_id}', [UserBookingController::class, 'create'])->name('booking.create');
Route::get('/booking/create/{hotel_id}', [UserBookingController::class, 'create'])->name('booking.create');
Route::post('/booking/store', [UserBookingController::class, 'store'])->name('booking.store');

// Owner hotel - chu khach san
Route::prefix('owner')->group(function () {
    // Show profile owner
    Route::get('/profile', [OwnerController::class, 'show'])->name('owner.show');

    // trang chỉnh sửa thông tin khách sạn
    Route::get('/hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('hotel.edit');
    // lưu thông tin chỉnh sửa
    Route::put('/hotels/{hotel}', [HotelController::class, 'update'])->name('hotel.update');

    // danh sách khách sạn của chủ khách sạn
    Route::get('/hotels', [OwnerManageBookingController::class, 'index'])->name('owner_manage.index');

    // trang danh sách đặt phòng của khách sạn
    Route::get('/manage-booking', [BookingListController::class, 'index'])->name('booking-list.index');
    //accept cho ng dùng thuê phòng
    Route::put('/manage-booking/{hotel_id}/accept/{booking}', [OwnerManageBookingController::class, 'update'])->name('owner_manage.update');
    // trả phòng
    Route::delete('/manage-booking/{hotel_id}/checkout/{booking_id}', [OwnerManageBookingController::class, 'destroy'])->name('owner_manage.destroy');
});
