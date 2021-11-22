@extends('layouts.main')

@section('title','Boards')

@section('content')
<article>
    <div class="board contents">
        <div class="common-title">
            <h1>Boards</h1>
        </div>
        <div class="common-body">
            <div class="posts-flex">
                    @forelse ($posts as $index => $post)
                                <div class="flex-item">
                                <a href="{{ route('posts.show', $index) }}"><p>
                                {{ $post }}</p>
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
