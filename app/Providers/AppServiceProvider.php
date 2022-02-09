<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        view()->composer('front.blog.blog-sidebar', function ($view) {
            $tags = \App\Models\ArticleTag::all();
            $category = \App\Models\ArticleCategory::all();
            $latestblog = \App\Models\Article::orderBy('created_at', 'desc')->take(4)->get();
            $view->with(compact('tags', 'latestblog', 'category'));
        });

    }
}
