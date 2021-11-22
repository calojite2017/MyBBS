<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // 全てのレコードを抽出 created_atをdescにorderByした状態で。
        $posts = Post::latest()->get();

        return view('posts.index')
            ->with(['posts' => $posts]);
    }

    // Implicit Binding
    // 引数内の処理：$postにPostクラスmodel(postテーブル)のidやレコードを格納 -(1)
    // ルーティングのURL名に{post}を使うこと
    public function show(Post $post)
     {
        // 該当idのみのデータを変数に格納（idがない場合は404エラーページを返す）
        // $post = Post::findOrFail($id); (1)の処理をしたので不要

        return view('posts.show')
            ->with(['post' => $post]);
    }
}
