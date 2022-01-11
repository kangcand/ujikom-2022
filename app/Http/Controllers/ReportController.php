<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function article()
    {
        return view('admin.report.article');
    }

    public function reportArticle(Request $request)
    {
        $start = $request->tanggalAwal;
        $end = $request->tanggalAkhir;
        $article = Article::whereBetween('created_at', [$start, $end])
            ->get();
        // dd($article);
        $pdf = \PDF::loadView('admin.report.article_report', ['article' => $article]);
        return $pdf->download('article-report.pdf');
    }
}
