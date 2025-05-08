<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HajiController;
use App\Http\Controllers\UmrohController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\VisaController;
use App\Http\Controllers\MuttowifController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;

// User Public Routes
Route::get('/', [UserController::class, 'index'])->name('user.home');
Route::get('/informasi', [UserController::class, 'informasi'])->name('user.informasi');

Route::get('/haji', [HajiController::class, 'index'])->name('user.haji.index');
Route::get('/haji/detail', [HajiController::class, 'detail'])->name('user.haji.detail');

Route::get('/umroh', [UmrohController::class, 'index'])->name('user.umroh.index');
Route::get('/umroh/detail', [UmrohController::class, 'detail'])->name('user.umroh.detail');

Route::get('/hotel', [HotelController::class, 'index'])->name('user.hotel.index');
Route::get('/hotel/detail', [HotelController::class, 'detail'])->name('user.hotel.detail');
Route::get('/hotel/pemesanan', [HotelController::class, 'pemesananHotel'])->name('user.hotel.pemesanan');

Route::get('/transport', [TransportController::class, 'index'])->name('user.transport.index');
Route::get('/transport/detail', [TransportController::class, 'detail'])->name('user.transport.detail');

Route::get('/muttowif', [MuttowifController::class, 'index'])->name('user.muttowif.index');
Route::get('/visa', [VisaController::class, 'index'])->name('user.visa.index');

// Admin Login Routes (only for non-authenticated admin)
Route::group(['middleware' => 'guest:admin'], function () {
    Route::get('/admin/login', [AdminAuthController::class, 'index'])->name('admin.login.form');
    Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
});

// User Login/Register Routes (only for non-authenticated user)
Route::group(['middleware' => 'guest:user'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('user.login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::get('/register', [RegisterController::class, 'index'])->name('user.register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('user.register');
});

// Admin Protected Routes
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// User Protected Routes
Route::middleware(['auth:user'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('user.logout');
    Route::get('/checkout', [UserController::class, 'checkout'])->name('user.checkout');
    Route::get('/invoice', [UserController::class, 'invoice'])->name('user.invoice');
    Route::get('/upload-payment', [UserController::class, 'uploadPayment'])->name('user.uploadPayment');
});





