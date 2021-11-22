@extends('layouts.main')

@section('title', $post->title)

@section('content')
<article>
    <div class="posts contents">
        <div class="common-title">
            <h1>{{ $post->title }}</h1>
        <div>
        <div class="post-body">
            <p>{{ $post->body }}</p>
        </div>
        <div class="common-back-link">
            &laquo; <a href="{{ route('posts.index') }}">もどる</a>
        </div>
    </div>
</article>
@endsection
