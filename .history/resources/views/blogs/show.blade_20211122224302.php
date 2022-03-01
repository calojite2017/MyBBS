@extends('layouts.main')

@section('title', $blog )

@section('content')
<article>
    <div class="blogs contents">
        <div class="common-title">
            <h1>{{ $blog->title }}</h1>
        <div>
        <div class="common-body">
            <p>{{ $blog->body }}

        </div>
        <div class="common-back-link">
            &laquo; <a href="{{ route('blogs.index') }}">もどる</a>
        </div>
    </div>
</article>
@endsection
