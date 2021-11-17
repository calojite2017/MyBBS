@extends('layouts.main')

@section('title','掲示板')

@section('content')
<article>
    <h1>掲示板</h1>
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
</article>
@endsection
