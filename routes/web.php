<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopPageServer;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;

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

// トップページ
Route::get('/', [TopPageServer::class, 'index'])
    ->name('index');

// 掲示板
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');

// ブログ
Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
