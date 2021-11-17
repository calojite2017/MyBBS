@extends('layouts.main')

@section('title', $post )

@section('content')
<article>
    <h1>{{ $post }}</h1>
    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">もどる</a>
    </div>
</article>
@endsection
