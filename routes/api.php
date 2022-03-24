<?php

use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\API\KategoriController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// route api
Route::resource('kategori', KategoriController::class);
Route::resource('users', UserController::class);

// api
Route::get('artikel', [ApiController::class, 'article']);
Route::get('reportPerDay', [ApiController::class, 'reportPerDay']);
Route::get('reportPerMonth', [ApiController::class, 'reportPerMonth']);
