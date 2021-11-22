@extends('layouts.main')

@section('title', $post )

@section('content')
<article>
    <div class="posts-contents">
        <div class="common-title">
            <h1>{{ $post }}</h1>
        <div>
        <div class="common-body">

        </div>
        <div class="common-back-link">
            &laquo; <a href="{{ route('posts.index') }}">もどる</a>
        </div>
    </div>
</article>
@endsection
