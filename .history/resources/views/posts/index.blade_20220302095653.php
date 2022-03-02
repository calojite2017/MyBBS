@include('layouts.main')

@include('components.header')

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
                            <a href="{{ route('posts.show', $post) }}">
                                <p>{{ $post->created_at }}</p>
                                <h3>*{{ $post->title }}</h3>
                            </a>
                        </div>
                    @empty
                        <li>No posts yet!</li>
                    @endforelse
            </div>
        </div>
    </div>
    {{ $posts->links('components.pagenation') }}
</article>

@include('components.footer')
