<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{

    public function index()
    {
        $user = User::count();
        $product = Product::count();
        $article = Article::count();
        return view('admin.index', compact('user', 'product', 'article'));
    }

}
