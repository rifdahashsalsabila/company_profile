<?php

use App\Http\Controllers\AdminAbouController;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminKategoriController;
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


Route::get('/login', function () {
    $data = [
        'content' => 'home/auth/login'
    ];
    return view('home.layout.wrapper', $data);
});

// =====ADMIN====
Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        $data = [
            'content' => 'admin/dashboard/index'
        ];
        return view('admin.layouts.wrapper', $data);
    });
    
    Route::resource('/posts/blog', AdminBlogController::class);
    Route::resource('/posts/kategori', AdminKategoriController::class);
    Route::resource('/banner', AdminBannerController::class);
    Route::resource('/service', AdminService::class );
    Route::resource('/user', AdminUserController::class);
    Route::resource('/about', AdminAbouController::class);
});
