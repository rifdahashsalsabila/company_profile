<?php

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
