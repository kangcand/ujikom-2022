<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Product;
use App\Models\User;
use DB;
use Carbon\Carbon;
class AdminController extends Controller
{

    public function index()
    {
        $user = User::count();
        $product = Product::count();
        $article = Article::count();
        // $a = Article::select('*')
        //         ->whereMonth('created_at', Carbon::now()->month)
        //         ->count();
        // dd($a);
        return view('admin.index', compact('user', 'product', 'article'));
    }

}
