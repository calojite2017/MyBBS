<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopPageServer;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Company;

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

// 広告
Route::get('news/{news_no}', [NewsController::class, 'detail'])->whereNumber('news_no')->name('news.detail');

// 掲示板
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [PostController::class, 'show'])
    ->name('posts.show')
    ->where('post', '[0-9]+');
// Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::middleware(['auth:sanctum', 'verified'])->get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('posts/{post}/edit', [PostController::class, 'edit'])
    ->name('posts.edit')
    ->where('post', '[0-9]+');
Route::patch('posts/{post}/update', [PostController::class, 'update'])
    ->name('posts.update')
    ->where('post', '[0-9]+');
Route::delete('posts/{post}/destroy', [PostController::class, 'destroy'])
    ->name('posts.destroy')
    ->where('post', '[0-9]+');
Route::post('posts/{post}/comments', [CommentController::class, 'store'])
    ->name('comments.store')
    ->where('post', '[0-9]+');
Route::delete('comments/{comment}/destroy', [CommentController::class, 'destroy'])
    ->name('comments.destroy')
    ->where('comment', '[0-9]+');

// ブログ
Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');

// 共通変数
View::composer('components/footer', function($view)
{
  $c_address = Company::where('id', 1)->first();
  $c_post = Company::where('id', 2)->first();
  $privacy = Company::where('id', 3)->first();
  $company = Company::where('id', 4)->first();

  $view->with(['c_address' =>  $c_address, 'c_post' => $c_post, 'privacy' => $privacy, 'company' => $company ]);
});

// フッター
Route::get('company/{id}', [CompanyController::class, 'index'])->whereNumber('id')->name('company');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('redirects',[LoginController::class, 'index']);//追記

// contactページ

