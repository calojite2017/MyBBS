@extends('layouts.main')

@section('title', $post->title)

@section('content')
<article>
    <div class="posts contents">
        <div class="common-title">
            <h1>
                <span>{{ $post->title }}</span>
                <a href="{{ route('posts.edit', $post) }}">[Edit]</a>
            </h1>
        <div>
        <div class="post-body">
            {{-- htmlタグをe()で文字実態参照化->nl2br()で改行をbrタグ化->{!!でタグや文字実体参照が反映されるように --}}
            <p>{!! nl2br(e($post->body)) !!}</p>
        </div>
        <div class="common-back-link">
            &laquo; <a href="{{ route('posts.index') }}">もどる</a>
        </div>
    </div>
</article>
@endsection
