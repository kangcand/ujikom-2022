<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Carbon\Carbon;
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
            ->join('article_categories', 'articles.category_id', '=', 'article_categories.id', )
        // ->join('article_tags', 'article_tags.id', '=', 'articles.id', )
            ->select('articles.title', 'articles.slug', 'articles.foto', 'article_categories.name as kategori')
            ->get();
        return response()->json([
            'success' => true,
            'message' => 'data artikel',
            'data' => $artikel,
        ], 200);
    }

    public function reportPerDay()
    {

        $date = Carbon::now()->startOfDay();
        $artikel = DB::table('articles')
            ->join('article_categories', 'articles.category_id', '=', 'article_categories.id', )
            ->select('articles.title', 'articles.slug', 'articles.foto', 'article_categories.name as kategori')
            ->whereDate('articles.created_at', date('Y-m-d'))
            ->get();
        $total = Article::select('user_id', DB::raw('sum(user_id) as total_pengguna'))->groupBy('user_id')->first();
        return response()->json([
            'success' => true,
            'message' => 'data laporan harian',
            'data' => $artikel,
        ], 200);
    }

    public function reportPerMonth()
    {

        $month = Carbon::now();
        $start = Carbon::parse($month)->startOfMonth();
        $end = Carbon::parse($month)->endOfMonth();

        $artikel = DB::table('articles')
            ->join('article_categories', 'articles.category_id', '=', 'article_categories.id', )
            ->select('articles.title', 'articles.slug', 'articles.foto', 'article_categories.name as kategori')
            ->whereBetween('articles.created_at', [$start, $end])
            ->get();

        $total = Article::select('user_id', DB::raw('sum(user_id) as total_pengguna'))->groupBy('user_id')->first();
        return response()->json([
            'success' => true,
            'message' => 'data laporan bulanan',
            'data' => $artikel,
        ], 200);
    }
}
