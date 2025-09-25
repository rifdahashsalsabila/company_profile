<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeBlogController extends Controller
{
     function index()
    {
      $data = [
        'blog'  => Blog::first(),
        'content' => '/home/blog/index'
      ];
      return view('home.layout.wrapper', $data);
    }
}
