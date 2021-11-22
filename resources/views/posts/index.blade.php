@extends('layouts.main')

@section('title','掲示板')

@section('content')
<article>
    <div class="board contents">
        <div class="common-title">
            <h1>On Board</h1>
        </div>
        <div class="common-body">
            <ul>
                @forelse ($posts as $index => $post)
                    <li>
                        <a href="{{ route('posts.show', $index) }}">
                        {{ $post }}
                        </a>
                    </li>
                @empty
                    <li>No posts yet!</li>
                @endforelse
            </ul>
        </div>
    </div>
</article>
@endsection
