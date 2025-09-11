<?php

use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminPesanController;
use App\Http\Controllers\AdminService;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    // return view('home.index');
    $data = [
        'content' => '/home/home/index'
    ];
    return view('home.layout.wrapper', $data);
});


Route::get('/about', function () {
    $data = [
        'content' => 'home/about/index'
    ];
    return view('home.layout.wrapper', $data);
});

Route::get('/services', function () {
    $data = [
        'content' => 'home/services/index'
    ];
    return view('home.layout.wrapper', $data);
});

Route::get('/blog', function () {
    $data = [
        'content' => 'home/blog/index'
    ];
    return view('home.layout.wrapper', $data);
});

Route::get('/contact', function () {
    $data = [
        'content' => 'home/contact/index'
    ];
    return view('home.layout.wrapper', $data);
});


Route::get('/login', [AdminAuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/do', [AdminAuthController::class, 'dologin']);

// =====ADMIN====
Route::prefix('/admin')->middleware('auth')->group(function () {

    Route::get('/logout', [AdminAuthController::class, 'logout']);
    Route::get('/dashboard', [AdminDashboardController::class, 'index']);

    Route::resource('/posts/blog', AdminBlogController::class);
    Route::resource('/posts/kategori', AdminKategoriController::class);
    Route::resource('/banner', AdminBannerController::class);
    Route::resource('/service', AdminService::class);
    Route::resource('/pesan', AdminPesanController::class);
    Route::resource('/user', AdminUserController::class);
    Route::resource('/about', AdminAboutController::class);
});
