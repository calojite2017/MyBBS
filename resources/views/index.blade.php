@extends('layouts.main')

@section('title','TOP')

@section('content')
<article>
    <div class="top-board">
        <a href="{{ route('posts.index') }}"><img src="{{ asset('images/book.png') }}"></a>
    </div>
</article>
@endsection
