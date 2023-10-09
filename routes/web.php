<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;

// trang chủ
Route::get('/', [HomeController::class, 'index']);
//trang tìm kiếm
Route::get('/search', [SearchController::class, 'index'])->name('search');