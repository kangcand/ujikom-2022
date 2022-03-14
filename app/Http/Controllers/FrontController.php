<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleTag;

class FrontController extends Controller
{
    public function index()
    {
        $article = Article::orderBy('created_at', 'desc')->take(3)->get();
        return view('front.index', compact('article'));
    }

    public function blog()
    {
        $article = Article::orderBy('created_at', 'desc')->paginate(4);
        return view('front.blog.blog', compact('article'));
    }

    public function singleBlog(Article $article)
    {
        $previous = Article::where('id', '<', $article->id)->orderBy('id', 'desc')->first();
        $next = Article::where('id', '>', $article->id)->orderBy('id')->first();
        return view('front.blog.singleblog', compact('article', 'next', 'previous'));
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
