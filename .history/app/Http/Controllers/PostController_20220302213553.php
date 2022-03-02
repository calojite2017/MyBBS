<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    protected $post_repository;

    public function __construct(PostRepository $post_repository)
    {
        $this->post_repository = $post_repository;
    }

    public function index()
    {
        $posts = $this->post_repository->getNewPosts(limit: 5);

        return view('posts.index')
            ->with(['posts' => $posts]);
    }

    // Implicit Binding（引数内の自動処理：$postにPostクラスmodel(postテーブル)のidやレコードを格納 -(1)）
    // ルーティングのURL名に{post}を使うこと
    public function show(Post $post)
    {
        // 該当idのみのデータを変数に格納（idがない場合は404エラーページを返す）
        // $post = Post::findOrFail($id); (1)の処理をしたので不要

        return view('posts.show')
            ->with(['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    // $requestをPostRequest型に変更。PostRequestのバリデーションを自動に行ってくれる。
    public function store(PostRequest $request)
    {
        // ポストインスタンスを作ってrequestデータを格納。
        $post = new Post();
        $post->title = $request->title;
        $post->name = $request->name;
        $post->body = $request->body;
        $post->save();
        // 処理後にリダイレクト
        return redirect()
            ->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit')
            ->with(['post' => $post]);
    }

    // $requestをPostRequest型に変更。PostRequestのバリデーションを自動に行ってくれる。
    public function update(PostRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->name = $request->name;
        $post->body = $request->body;
        $post->save();
        return redirect()
            ->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('posts.index');
    }
}
