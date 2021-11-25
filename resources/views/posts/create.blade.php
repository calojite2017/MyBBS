@extends('layouts.main')

@section('title','Boardee!')

@section('content')
<article>
    <div class="board contents">
        <div class="common-title">
            <h1>Boardee!</h1>
        </div>
        <div class="common-back-link">
            &laquo; <a href="{{ route('posts.index') }}">もどる</a>
        </div>
    </div>
</article>
@endsection
