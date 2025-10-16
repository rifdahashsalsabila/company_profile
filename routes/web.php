<?php

use App\Http\Controllers\AboutAdminController;
use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminPesanController;
use App\Http\Controllers\AdminService;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeBlogController;
use App\Http\Controllers\HomeContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/services', [HomeController::class, 'service']);

Route::get('/blog', [HomeBlogController::class, 'index']);
Route::get('/blog/show/{id}', [HomeBlogController::class, 'show']);
Route::get('/contact', [HomeContactController::class, 'index']);
Route::post('/contact/send', [HomeContactController::class, 'send']);

// Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
// Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AdminAuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/do', [AdminAuthController::class, 'dologin']);
Route::get('/logout', [AdminAuthController::class, 'logout']);

// =====CUSTOMER====

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    // Route::get('/bookings', [BookingController::class, 'index'])->name('admin.booking.index');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings');
    // Route::resource('bookings', BookingController::class)->except(['create', 'store']);
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/')->with('success', 'Anda berhasil logout!');
})->name('logout');

// Route::resource('booking', BookingController::class)->except(['create', 'store']);
Route::resource('bookings', BookingController::class)->except(['create', 'store']);

Route::prefix('admin')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        Route::resource('/posts/blog', AdminBlogController::class);
        Route::resource('/posts/kategori', AdminKategoriController::class);
        Route::resource('/banner', AdminBannerController::class);
        Route::resource('/service', AdminService::class);
        Route::resource('/pesan', AdminPesanController::class);
        Route::resource('/user', AdminUserController::class);
        Route::resource('/about', AdminAboutController::class);
        // Route::resource('booking', BookingController::class)->except(['create', 'store']);
        // Route::resource('bookings', BookingController::class)->except(['create', 'store']);
        Route::patch('/admin/bookings/{id}/status', [BookingController::class, 'updateStatus'])->name('admin.bookings.updateStatus');
    });
