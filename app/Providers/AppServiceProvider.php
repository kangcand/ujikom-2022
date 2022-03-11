<?php

namespace App\Providers;

// use Charts;
use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        view()->composer('front.blog.blog-sidebar', function ($view) {
            $tags = \App\Models\ArticleTag::all();
            $category = \App\Models\ArticleCategory::all();
            $latestblog = \App\Models\Article::orderBy('created_at', 'desc')->take(4)->get();
            $view->with(compact('tags', 'latestblog', 'category'));
        });

        $charts->register([
            \App\Charts\ArticleChart::class,
        ]);

    }
}
