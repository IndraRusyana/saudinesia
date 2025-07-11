<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\User\{UserController, HajiController, UmrohController, HotelController, TransportController, VisaController, MuttowifController, InformationsController, MerchandiseController, ProfileController, CartController, TransactionController, OrderController, InvoiceController, LoginController, RegisterController};
use App\Http\Controllers\Admin\{PeriodController, CitiesController, RouteController, DashboardController, AuthController as AdminAuthController, HajiController as AdminHajiController, UmrohController as AdminUmrohController, HotelController as AdminHotelController, InformationsController as AdminInformationsController, TransportController as AdminTransportController, MuttowifController as AdminMuttowifController, VisaController as AdminVisaController, UserController as AdminUserController, MerchandiseController as AdminMerchandiseController, TransactionController as AdminTransactionController, LandArrangementController, ContentController as AdminContentController};
use App\Http\Controllers\LanguageController;

Route::get('/lang/{lang}', [LanguageController::class, 'switch'])->name('lang.switch');

// User Public Routes
Route::get('/', [UserController::class, 'index'])->name('user.home');

Route::get('/informasi', [InformationsController::class, 'index'])->name('user.informasi.index');
Route::get('/informasi/detail/{id}', [InformationsController::class, 'detail'])->name('user.informasi.detail');

Route::get('/haji', [HajiController::class, 'index'])->name('user.haji.index');
Route::get('/haji/detail/{id}', [HajiController::class, 'detail'])->name('user.haji.detail');

Route::get('/umroh', [UmrohController::class, 'index'])->name('user.umroh.index');
Route::get('/umroh/detail/{id}', [UmrohController::class, 'detail'])->name('user.umroh.detail');

Route::get('/hotel', [HotelController::class, 'index'])->name('user.hotel.index');
Route::get('/hotel/detail/{id}', [HotelController::class, 'detail'])->name('user.hotel.detail');
Route::get('/hotel/pemesanan', [HotelController::class, 'pemesananHotel'])->name('user.hotel.pemesanan');

Route::get('/transport', [TransportController::class, 'index'])->name('user.transport.index');
Route::get('/transport/detail/{id}', [TransportController::class, 'detail'])->name('user.transport.detail');

Route::get('/merchandise', [MerchandiseController::class, 'index'])->name('user.merchandise.index');
Route::get('/merchandise/detail/{id}', [MerchandiseController::class, 'detail'])->name('user.merchandise.detail');

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

    Route::get('/auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);
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

    // admin route
    Route::get('/admin/rute', [RouteController::class, 'index'])->name('admin.routes.index');
    Route::get('/admin/rute-tambah', [RouteController::class, 'create'])->name('admin.routes.tambah');
    Route::post('/admin/rute', [RouteController::class, 'store'])->name('admin.routes.store');
    Route::get('/admin/rute/{id}', [RouteController::class, 'edit'])->name('admin.routes.edit');
    Route::put('/admin/rute/{id}', [RouteController::class, 'update'])->name('admin.routes.update');
    Route::delete('/admin/rute/{id}', [RouteController::class, 'destroy'])->name('admin.routes.destroy');

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
    Route::put('/admin/layanan/price-muttowif/{id}', [AdminMuttowifController::class, 'update'])->name('admin.price-muttowif.update');
    // Route::get('/admin/layanan/muttowif-tambah', [AdminMuttowifController::class, 'create'])->name('admin.muttowif.tambah');
    // Route::post('/admin/layanan/muttowif', [AdminMuttowifController::class, 'store'])->name('admin.muttowif.store');
    // Route::get('/admin/layanan/muttowif/{id}', [AdminMuttowifController::class, 'edit'])->name('admin.muttowif.edit');
    // Route::put('/admin/layanan/muttowif/{id}', [AdminMuttowifController::class, 'update'])->name('admin.muttowif.update');
    // Route::delete('/admin/layanan/muttowif/{id}', [AdminMuttowifController::class, 'destroy'])->name('admin.muttowif.destroy');

    // admin muttowif
    Route::get('/admin/layanan/visa', [AdminVisaController::class, 'index'])->name('admin.visa.index');
    Route::put('/admin/layanan/price-visa/{id}', [AdminVisaController::class, 'update'])->name('admin.price-visa.update');
    // Route::get('/admin/layanan/visa-tambah', [AdminVisaController::class, 'create'])->name('admin.visa.tambah');
    // Route::post('/admin/layanan/visa', [AdminVisaController::class, 'store'])->name('admin.visa.store');
    // Route::get('/admin/layanan/visa/{id}', [AdminVisaController::class, 'edit'])->name('admin.visa.edit');
    // Route::put('/admin/layanan/visa/{id}', [AdminVisaController::class, 'update'])->name('admin.visa.update');
    // Route::delete('/admin/layanan/visa/{id}', [AdminVisaController::class, 'destroy'])->name('admin.visa.destroy');

    Route::get('/admin/transactions', [AdminTransactionController::class, 'index'])->name('admin.transactions.index');
    Route::post('/admin/transactions/{transaction}/verify', [AdminTransactionController::class, 'verify'])->name('admin.transactions.verify');
    Route::get('/admin/transactions/{transaction}', [AdminTransactionController::class, 'show'])->name('admin.transactions.show');

    // admin paket Merchandise
    Route::get('/admin/merchandise', [AdminMerchandiseController::class, 'index'])->name('admin.merchandise.index');
    Route::get('/admin/merchandise-tambah', [AdminMerchandiseController::class, 'create'])->name('admin.merchandise.tambah');
    Route::post('/admin/merchandise', [AdminMerchandiseController::class, 'store'])->name('admin.merchandise.store');
    Route::get('/admin/merchandise/{id}', [AdminMerchandiseController::class, 'edit'])->name('admin.merchandise.edit');
    Route::put('/admin/merchandise/{id}', [AdminMerchandiseController::class, 'update'])->name('admin.merchandise.update');
    Route::delete('/admin/merchandise/{id}', [AdminMerchandiseController::class, 'destroy'])->name('admin.merchandise.destroy');

    // admin LA
    Route::Resource('land-arrangements', LandArrangementController::class);

    // admin index user
    Route::get('/admin/content', [AdminContentController::class, 'index'])->name('admin.content.index');
    Route::post('/admin/hero', [AdminContentController::class, 'updateHero'])->name('admin.hero.update');
    Route::post('/admin/testimoni/{id}', [AdminContentController::class, 'updateTestimoni'])->name('admin.testimoni.update');
    Route::get('/galeri/create', [AdminContentController::class, 'createGaleri'])->name('admin.galeri.create');
    Route::post('/galeri/store', [AdminContentController::class, 'storeGaleri'])->name('admin.galeri.store');
    Route::get('/galeri/{id}/edit', [AdminContentController::class, 'editGaleri'])->name('admin.galeri.edit');
    Route::post('/admin/galeri/{id}', [AdminContentController::class, 'updateGaleri'])->name('admin.galeri.update');
    Route::delete('/galeri/{id}', [AdminContentController::class, 'deleteGaleri'])->name('admin.galeri.delete');

    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// User Protected Routes
Route::middleware(['auth:user'])->group(function () {
    Route::get('/debug', function () {
        $user = Auth::guard('user')->user();
        dd($user->email_verified_at, $user->hasVerifiedEmail());
    });

    // Tampilkan notifikasi bahwa harus verifikasi
    Route::get('/email/verify', function () {
        $user = Auth::guard('user')->user();
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('user.home');
        }

        return view('auth.user.verify-email');
    })
        ->middleware('auth:user')
        ->name('verification.notice');

    // Proses klik link verifikasi
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill(); // menandai email sudah diverifikasi
        return redirect()->route('user.home');
    })
        ->middleware(['auth:user', 'signed'])
        ->name('verification.verify');

    // Kirim ulang link verifikasi
    Route::post('/email/verification-notification', function (Request $request) {
        $user = Auth::guard('user')->user();
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('user.home');
        }
        $request->user('user')->sendEmailVerificationNotification();
        return back()->with('message', 'Link verifikasi telah dikirim!');
    })
        ->middleware(['auth:user', 'throttle:6,1'])
        ->name('verification.send');
});

Route::middleware(['auth:user', 'verified.user'])->group(function () {
    Route::resource('profiles', ProfileController::class);
    Route::put('/profiles/update', [ProfileController::class, 'update'])->name('profiles.update');

    Route::resource('carts', CartController::class)->only(['index', 'store', 'destroy']);

    Route::post('/logout', [LoginController::class, 'logout'])->name('user.logout');

    Route::get('/muttowif', [MuttowifController::class, 'index'])->name('user.muttowif.index');
    Route::post('/muttowif', [MuttowifController::class, 'store'])->name('user.muttowif.store');
    Route::get('/muttowif/{id}', [MuttowifController::class, 'detail'])->name('user.muttowif.detail');
    Route::post('/muttowif/checkout', [MuttowifController::class, 'checkout'])->name('user.muttowif.checkout');

    Route::get('/visa', [VisaController::class, 'index'])->name('user.visa.index');
    Route::post('/visa', [VisaController::class, 'store'])->name('user.visa.store');
    Route::get('/visa/{id}', [VisaController::class, 'detail'])->name('user.visa.detail');
    Route::post('/visa/checkout', [VisaController::class, 'checkout'])->name('user.visa.checkout');

    // Route::get('/checkout', [UserController::class, 'checkout'])->name('user.checkout');
    // Route::get('/invoice', [UserController::class, 'invoice'])->name('user.invoice');
    // Route::get('/upload-payment', [UserController::class, 'uploadPayment'])->name('user.uploadPayment');

    Route::post('/checkout', [OrderController::class, 'confirm'])->name('checkout.confirm');
    Route::post('/checkout/confirm', [OrderController::class, 'confirmMultiple'])->name('checkout.confirm.multiple');
    Route::post('/checkout/multiple', [OrderController::class, 'checkoutMultiple'])->name('checkout.multiple');

    Route::post('/invoice/generate', [InvoiceController::class, 'store'])->name('invoice.generate');
    Route::get('/invoice/show/{transaction}', [InvoiceController::class, 'show'])->name('invoice.show');
    Route::get('/invoice/{transaction}/upload', [InvoiceController::class, 'uploadForm'])->name('invoice.upload.form');
    Route::post('/invoice/{transaction}/upload', [InvoiceController::class, 'upload'])->name('invoice.upload');
    Route::post('/checkout/multiple', [InvoiceController::class, 'generateMultiple'])->name('checkout.multiple');

    Route::resource('/pesanan', TransactionController::class);
});
