@extends('layouts.main')

@section('title', $post->title)

@section('content')
<article>
    <div class="posts contents">
        <div class="common-title">
            <h1>
                <span>Boards * {{ $post->title }}</span>
                <a href="{{ route('posts.edit', $post) }}">[Edit]</a>
                <form method="post" action="{{ route('posts.destroy', $post) }}" id="delete_post">
                    @method('DELETE')
                    @csrf

                    <button class="delete-btn">[×]</button>
                </form>
            </h1>
        <div>
        <p>投稿日：{{ $post->created_at }}</p>
        <div class="post-body">
            {{-- htmlタグをe()で文字実態参照化->nl2br()で改行をbrタグ化->{!!でタグや文字実体参照が反映されるように --}}
            <p>{!! nl2br(e($post->body)) !!}</p>
        </div>
        {{-- 戻るボタン --}}
        <div class="common-back-link">
            &laquo; <a href="{{ route('posts.index') }}">もどる</a>
        </div>
    </div>
    {{-- コメント欄 --}}
    <div class="post-comments">
        <h2>Comments</h2>
        <ul>
            <li>
                <form method="post" action="{{ route('comments.store', $post) }}" class="comments-form">
                    @csrf
                    <input type="text" name="body">
                    <button>Add</button>
                </form>
                @error('body')
                <div class="error">{{ $message }}</div>
                @enderror
            </li>
            {{-- コメント削除 --}}
            @foreach ($post->comments()->latest()->get() as $comment)
                <li>
                    {{ $comment->body }}
                    <span>@ {{ $post->created_at }} </span>
                    <form method="post" action="{{ route('comments.destroy', $comment) }}" class="delete-comments">
                        @method('DELETE')
                        @csrf
                        <button>[×]</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- スクリプトタグ・削除アラート作成 --}}
    <script>
        'use strict';

        {
            document.getElementById('delete_post').addEventListener('submit', e =>{
                e.preventDefault();

                if (!confirm('本当に削除しますか?')) {
                    return;
                }

                e.target.submit();
            });

            // querySelectorAll()で全ての要素を取得
            document.querySelectorAll('.delete-comments').forEach(form => {
                form.addEventListener('submit', e => {
                    e.preventDefault();

                    if(!confirm('本当に削除しますか？')) {
                        return;
                    }

                    form.submit();
                });
            });
        }
    </script>
</article>
@endsection
