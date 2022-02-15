<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use DB;
use Illuminate\Http\Request;
use Session;

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
        if ($start > $end) {
            Session::flash("flash_notification", [
                "level" => "danger",
                "message" => "Maaf tanggal yang anda masukan tidak sesuai",
            ]);
            return back();

        } else {
            $article = Article::whereBetween('created_at', [$start, $end])
                ->get();
            $total = Article::select('user_id', DB::raw('sum(user_id) as total_pengguna'))->groupBy('user_id')->first();
            // dd($total);
            // dd($article);
            // $pdf = \PDF::loadView('admin.report.article_report', ['article' => $article]);
            // return $pdf->download('article-report.pdf');
            return view('admin.report.article_report', ['article' => $article, 'total_pengguna' => $total]);
        }

    }
}
