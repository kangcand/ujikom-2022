<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleTag;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    // example
    public function blog()
    {
        $article = Article::all();
        return view('front.blog.blog', compact('article'));
    }

    public function singleBlog(Article $article)
    {
        return view('front.blog.singleblog', compact('article'));
    }

    public function blogtag(ArticleTag $tag)
    {
        $article = $tag->Article()->latest()->paginate(5);
        return view('front.blog.blog', compact('article'));
    }

    public function blogcategory(ArticleCategory $category)
    {
        $article = $category->Article()->latest()->paginate(5);
        return view('front.blog.blog', compact('article'));
    }
}
