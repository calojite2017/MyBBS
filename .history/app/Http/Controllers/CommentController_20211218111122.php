<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Post $post)
    {
        // コメントモデルのインスタンス作成
        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->body = $request->body;
        $comment->name = $request->name;
        $comment->save();

        return redirect()
            ->route('posts.show', $post);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()
            ->route('posts.show', $comment->post);
    }
}
