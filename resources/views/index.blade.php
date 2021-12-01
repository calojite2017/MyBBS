@extends('layouts.main')

@section('title','TOP')

@section('content')
<article>
    <div class="top-menu">
        <div class="top-board anime1">
            {{-- <a href="{{ route('posts.index') }}"><img src="{{ asset('images/board.svg') }}"></a> --}}
            <a href="{{ route('posts.index') }}"><span>BBS</span></a>
        </div>
        <div class="top-blog anime2">
            {{-- <a href="{{ route('blogs.index') }}"><img src="{{ asset('images/blog.svg') }}"></a> --}}
            <a href="{{ route('blogs.index') }}"><span>BLOG</span></a>
        </div>
        <div class="top-contact anime1">
            <a href="#"><span>CONTACT</span></a>
        </div>
        <div class="top-news anime2">
            <a href="#"><span>NEWS</span></a>
        </div>
    </div>

    <div class="news-list">
        <h1>News-list</h1>
    </div>
</article>
@endsection
