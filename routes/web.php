<?php

use App\Http\Controllers\Backend\ArticleCategoryController;
use App\Http\Controllers\Backend\ArticleController;
use App\Http\Controllers\Backend\ArticleTagController;
use App\Http\Controllers\Backend\ProductCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductTagController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
]);

Route::get('/home', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('home');

// route admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']],
    function () {
        Route::get('/', function () {
            return view('admin.index');
        });
        // article route
        Route::resource('article-category', ArticleCategoryController::class);
        Route::resource('article-tag', ArticleTagController::class);
        Route::resource('article', ArticleController::class);

        // product route
        Route::resource('product-category', ProductCategoryController::class);
        Route::resource('product-tag', ProductTagController::class);
        Route::resource('product', ProductController::class);

        // user management
        Route::resource('users', UserController::class);

        // report
        Route::get('laporan-article', [ReportController::class, 'article'])->name('getArticle');
        Route::post('laporan-article', [ReportController::class, 'reportArticle'])->name('reportArticle');

    });

//member
Route::group(['prefix' => 'member', 'middleware' => ['auth', 'role:member|admin']],
    function () {
        Route::get('/', function () {
            return 'halaman member';
        });
        Route::get('profile', function () {
            return 'halaman profile member';
        });

    });

// front Route
Route::group(['prefix' => '/'], function () {
    Route::get('/', [FrontController::class, 'index']);
    Route::get('blog', [FrontController::class, 'blog']);
    Route::get('blog/{article}', [FrontController::class, 'singleBlog']);
    Route::get('blog-tag/{tag}', [FrontController::class, 'blogtag']);
    Route::get('blog-category/{category}', [FrontController::class, 'blogcategory']);

});
