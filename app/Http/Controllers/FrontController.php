<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    // example
    public function blog()
    {
        return view('blog');
    }

    public function singleBlog()
    {
        return view('singleBlog');
    }
}


