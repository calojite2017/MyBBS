@extends('layouts.main')

@section('title', $blog )

@section('content')
<article>
    <div class="blogs contents">
        <div class="common-title">
            <h1>{{ $blog }}</h1>
        <div>
        <div class="common-body">

        </div>
        <div class="common-back-link">
            &laquo; <a href="{{ route('blogs.index') }}">もどる</a>
        </div>
    </div>
</article>
@endsection
