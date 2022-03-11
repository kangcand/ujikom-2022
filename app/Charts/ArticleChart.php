<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Models\Article;
class ArticleChart extends BaseChart
{
    public ?string $name = 'article_chart';
    public ?string $routeName = 'article_chart';
    public ?string $prefix = 'admin';
    public ?array $middlewares = ['auth'];



    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
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
        return Chartisan::build()
            ->labels($labels)
            ->dataset('Artikel Rilis', $count);
    }
}
