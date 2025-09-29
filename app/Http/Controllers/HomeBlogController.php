<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeBlogController extends Controller
{
     function index()
    {
      $data = [
        'blog'  => Blog::all(),
        'content' => '/home/blog/index'
      ];
      return view('home.layout.wrapper', $data);
    }

    public function show(string $id)
    {
        $data = [
            'blog' => Blog::find($id),
            'content' => 'home/blog/show'
        ];
        return view('home.layout.wrapper', $data);
    }

}
