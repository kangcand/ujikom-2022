<?php

declare (strict_types = 1);

namespace App\Charts;

use App\Models\Article;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use DB;
use Illuminate\Http\Request;

class ArticleChart extends BaseChart
{
    ?stringpublic $name = 'article_chart';
    ?stringpublic $routeName = 'article_chart';
    ?stringpublic $prefix = 'admin';
    ?arraypublic $middlewares = ['auth'];

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request) : Chartisan
    {

        $articles = DB::table('articles')->get();
        $labels = [];
        $count = [];
        foreach ($articles as $data) {
            array_push($labels, $data->created_at);
        }
        $values = Article::select('*')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        foreach ($values as $item) {
            array_push($count, $item->count());
        }
        //
        return Chartisan::build()
            ->labels($labels)
            ->dataset('Artikel Rilis', $count);
    }
}
