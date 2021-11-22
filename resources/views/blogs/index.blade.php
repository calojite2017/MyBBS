@extends('layouts.main')

@section('title','Blogs')

@section('content')
<article>
    <div class="blogs contents">
        <div class="common-title">
            <h1>Blogs</h1>
        </div>
        <div class="common-body">
            <div class="blogs-body">
                    @forelse ($blogs as $blog)
                                <div class="blogs-item">
                                <a href="{{ route('blogs.show', $blog) }}"><p>
                                {{ $blog->title }}</p>
                                </a>
                            </div>
                    @empty
                        <li>No blogss yet!</li>
                    @endforelse
            </div>
        </div>
    </div>
</article>
@endsection
