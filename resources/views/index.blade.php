@extends('layouts.main')

@section('title','TOP')

@section('content')
<article>
    <div class="top-board anime1">
        <a href="{{ route('posts.index') }}"><img src="{{ asset('images/board.svg') }}"></a>
    </div>
    <div class="top-blog anime2">
        <a href="{{ route('blogs.index') }}"><img src="{{ asset('images/blog.svg') }}"></a>
    </div>
</article>
@endsection
