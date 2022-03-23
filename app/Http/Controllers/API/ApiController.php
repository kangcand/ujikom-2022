<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use DB;

class ApiController extends Controller
{
    public function kategori()
    {
        $kategori = ArticleCategory::all();
        return response()->json([
            'success' => true,
            'message' => 'Data Kategori',
            'data' => $kategori,
        ], 200);
    }

    public function article()
    {
        // $artikel = Article::with('category')->get();
        $artikel = DB::table('articles')
            ->join('article_categories', 'articles.category_id', '=', 'article_categories.id')
            ->select('articles.title', 'articles.slug', 'articles.foto', 'article_categories.name as kategori')
            ->get();
        return response()->json([
            'success' => true,
            'message' => 'data artikel',
            'data' => $artikel,
        ], 200);
    }
}
