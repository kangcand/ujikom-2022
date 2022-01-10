<?php

use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleTagController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Auth::routes([
    'register' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
Route::group(['prefix' => '/'],
    function () {
        Route::get('/', [FrontController::class, 'index']);
        Route::get('blog', [FrontController::class, 'blog']);
        Route::get('blog/{blog}', [FrontController::class, 'singleBlog']);

    });
