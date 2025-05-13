<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\HajiController;
use App\Http\Controllers\User\UmrohController;
use App\Http\Controllers\User\HotelController;
use App\Http\Controllers\User\TransportController;
use App\Http\Controllers\User\VisaController;
use App\Http\Controllers\User\MuttowifController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\Admin\PeriodController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\HajiController as AdminHajiController;
use App\Http\Controllers\Admin\UmrohController as AdminUmrohController;
use App\Http\Controllers\Admin\HotelController as AdminHotelController;
use App\Http\Controllers\Admin\InformationsController as AdminInformationsController;
use App\Http\Controllers\Admin\TransportController as AdminTransportController;
use App\Http\Controllers\Admin\MuttowifController as AdminMuttowifController;
use App\Http\Controllers\Admin\VisaController as AdminVisaController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

// User Public Routes
Route::get('/', [UserController::class, 'index'])->name('user.home');
Route::get('/informasi', [UserController::class, 'informasi'])->name('user.informasi');

Route::get('/haji', [HajiController::class, 'index'])->name('user.haji.index');
Route::get('/haji/detail/{id}', [HajiController::class, 'detail'])->name('user.haji.detail');

Route::get('/umroh', [UmrohController::class, 'index'])->name('user.umroh.index');
Route::get('/umroh/detail/{id}', [UmrohController::class, 'detail'])->name('user.umroh.detail');

Route::get('/hotel', [HotelController::class, 'index'])->name('user.hotel.index');
Route::get('/hotel/detail/{id}', [HotelController::class, 'detail'])->name('user.hotel.detail');
Route::get('/hotel/pemesanan', [HotelController::class, 'pemesananHotel'])->name('user.hotel.pemesanan');

Route::get('/transport', [TransportController::class, 'index'])->name('user.transport.index');
Route::get('/transport/detail/{id}', [TransportController::class, 'detail'])->name('user.transport.detail');

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
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [DashboardController::class, 'listUser'])->name('admin.users.index');

    // admin periode
    Route::get('/admin/periode', [PeriodController::class, 'index'])->name('admin.periods.index');
    Route::get('/admin/periode-tambah', [PeriodController::class, 'create'])->name('admin.periods.tambah');
    Route::post('/admin/periode', [PeriodController::class, 'store'])->name('admin.periods.store');
    Route::get('/admin/periode/{id}', [PeriodController::class, 'edit'])->name('admin.periods.edit');
    Route::put('/admin/periode/{id}', [PeriodController::class, 'update'])->name('admin.periods.update');
    Route::delete('/admin/periode/{id}', [PeriodController::class, 'destroy'])->name('admin.periods.destroy');

    // admin informasi
    Route::get('/admin/informasi', [AdminInformationsController::class, 'index'])->name('admin.informations.index');
    Route::get('/admin/informasi-tambah', [AdminInformationsController::class, 'create'])->name('admin.informations.tambah');
    Route::post('/admin/informasi', [AdminInformationsController::class, 'store'])->name('admin.informations.store');
    Route::get('/admin/informasi/{id}', [AdminInformationsController::class, 'edit'])->name('admin.informations.edit');
    Route::put('/admin/informasi/{id}', [AdminInformationsController::class, 'update'])->name('admin.informations.update');
    Route::delete('/admin/informasi/{id}', [AdminInformationsController::class, 'destroy'])->name('admin.informations.destroy');

    // admin kota
    Route::get('/admin/kota', [CitiesController::class, 'index'])->name('admin.cities.index');
    Route::get('/admin/kota-tambah', [CitiesController::class, 'create'])->name('admin.cities.tambah');
    Route::post('/admin/kota', [CitiesController::class, 'store'])->name('admin.cities.store');
    Route::get('/admin/kota/{id}', [CitiesController::class, 'edit'])->name('admin.cities.edit');
    Route::put('/admin/kota/{id}', [CitiesController::class, 'update'])->name('admin.cities.update');
    Route::delete('/admin/kota/{id}', [CitiesController::class, 'destroy'])->name('admin.cities.destroy');

    // admin paket haji
    Route::get('/admin/paket/haji', [AdminHajiController::class, 'index'])->name('admin.haji.index');
    Route::get('/admin/paket/haji-tambah', [AdminHajiController::class, 'tambah'])->name('admin.haji.tambah');
    Route::post('/admin/paket/haji', [AdminHajiController::class, 'store'])->name('admin.haji.store');
    Route::get('/admin/paket/haji/{id}', [AdminHajiController::class, 'edit'])->name('admin.haji.edit');
    Route::put('/admin/paket/haji/{id}', [AdminHajiController::class, 'update'])->name('admin.haji.update');
    Route::delete('/admin/paket/haji/{id}', [AdminHajiController::class, 'destroy'])->name('admin.haji.destroy');

    // admin paket umroh
    Route::get('/admin/paket/umroh', [AdminUmrohController::class, 'index'])->name('admin.umroh.index');
    Route::get('/admin/paket/umroh-tambah', [AdminUmrohController::class, 'tambah'])->name('admin.umroh.tambah');
    Route::post('/admin/paket/umroh', [AdminUmrohController::class, 'store'])->name('admin.umroh.store');
    Route::get('/admin/paket/umroh/{id}', [AdminUmrohController::class, 'edit'])->name('admin.umroh.edit');
    Route::put('/admin/paket/umroh/{id}', [AdminUmrohController::class, 'update'])->name('admin.umroh.update');
    Route::delete('/admin/paket/umroh/{id}', [AdminUmrohController::class, 'destroy'])->name('admin.umroh.destroy');

    // admin paket hotel
    Route::get('/admin/layanan/hotel', [AdminHotelController::class, 'index'])->name('admin.hotel.index');
    Route::get('/admin/layanan/hotel-tambah', [AdminHotelController::class, 'create'])->name('admin.hotel.tambah');
    Route::post('/admin/layanan/hotel', [AdminHotelController::class, 'store'])->name('admin.hotel.store');
    Route::get('/admin/layanan/hotel/{id}', [AdminHotelController::class, 'edit'])->name('admin.hotel.edit');
    Route::put('/admin/layanan/hotel/{id}', [AdminHotelController::class, 'update'])->name('admin.hotel.update');
    Route::delete('/admin/layanan/hotel/{id}', [AdminHotelController::class, 'destroy'])->name('admin.hotel.destroy');

    // admin paket transport
    Route::get('/admin/layanan/transport', [AdminTransportController::class, 'index'])->name('admin.transport.index');
    Route::get('/admin/layanan/transport-tambah', [AdminTransportController::class, 'create'])->name('admin.transport.tambah');
    Route::post('/admin/layanan/transport', [AdminTransportController::class, 'store'])->name('admin.transport.store');
    Route::get('/admin/layanan/transport/{id}', [AdminTransportController::class, 'edit'])->name('admin.transport.edit');
    Route::put('/admin/layanan/transport/{id}', [AdminTransportController::class, 'update'])->name('admin.transport.update');
    Route::delete('/admin/layanan/transport/{id}', [AdminTransportController::class, 'destroy'])->name('admin.transport.destroy');

    // admin muttowif
    Route::get('/admin/layanan/muttowif', [AdminMuttowifController::class, 'index'])->name('admin.muttowif.index');
    // Route::get('/admin/layanan/muttowif-tambah', [AdminMuttowifController::class, 'create'])->name('admin.muttowif.tambah');
    // Route::post('/admin/layanan/muttowif', [AdminMuttowifController::class, 'store'])->name('admin.muttowif.store');
    // Route::get('/admin/layanan/muttowif/{id}', [AdminMuttowifController::class, 'edit'])->name('admin.muttowif.edit');
    // Route::put('/admin/layanan/muttowif/{id}', [AdminMuttowifController::class, 'update'])->name('admin.muttowif.update');
    // Route::delete('/admin/layanan/muttowif/{id}', [AdminMuttowifController::class, 'destroy'])->name('admin.muttowif.destroy');

    // admin muttowif
    Route::get('/admin/layanan/visa', [AdminVisaController::class, 'index'])->name('admin.visa.index');
    // Route::get('/admin/layanan/visa-tambah', [AdminVisaController::class, 'create'])->name('admin.visa.tambah');
    // Route::post('/admin/layanan/visa', [AdminVisaController::class, 'store'])->name('admin.visa.store');
    // Route::get('/admin/layanan/visa/{id}', [AdminVisaController::class, 'edit'])->name('admin.visa.edit');
    // Route::put('/admin/layanan/visa/{id}', [AdminVisaController::class, 'update'])->name('admin.visa.update');
    // Route::delete('/admin/layanan/visa/{id}', [AdminVisaController::class, 'destroy'])->name('admin.visa.destroy');

    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// User Protected Routes
Route::middleware(['auth:user'])->group(function () {

    Route::post('/logout', [LoginController::class, 'logout'])->name('user.logout');

    Route::get('/muttowif', [MuttowifController::class, 'index'])->name('user.muttowif.index');
    Route::post('/muttowif', [MuttowifController::class, 'store'])->name('user.muttowif.store');

    Route::get('/visa', [VisaController::class, 'index'])->name('user.visa.index');
    Route::post('/visa', [VisaController::class, 'store'])->name('user.visa.store');

    Route::get('/checkout', [UserController::class, 'checkout'])->name('user.checkout');
    Route::get('/invoice', [UserController::class, 'invoice'])->name('user.invoice');
    Route::get('/upload-payment', [UserController::class, 'uploadPayment'])->name('user.uploadPayment');
});
