@extends('layouts.main')

@section('title','Boards')

@section('content')
<article>
    <div class="board contents">
        <div class="common-title">
            <h1>
                <span>Boards</span>
                <a href="{{ route('posts.create') }}">[Add]</a>
            </h1>
        </div>
        <div class="common-body">
            <div class="posts-flex">
                    @forelse ($posts as $post)
                                <div class="flex-item">
                                <a href="{{ route('posts.show', $post) }}"><p>
                                {{ $post->title }}</p>
                                </a>
                            </div>
                    @empty
                        <li>No posts yet!</li>
                    @endforelse
            </div>
        </div>
    </div>
</article>
@endsection
