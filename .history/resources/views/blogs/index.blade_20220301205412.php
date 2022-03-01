@include('layouts.main')

@include('components.header')

<article>
    <div class="blogs contents">
        <div class="common-title">
            <h1>Blogs</h1>
        </div>
        <div class="common-body">
            <div class="blogs-body blogs-flex">
                    @forelse ($blogs as $blog)
                                <div class="blogs-item">
                                <a href="{{ route('blogs.show', $blog) }}"><p>
                                {{ $blog->created_at }}{{ $blog->title }}</p>
                                </a>
                            </div>
                    @empty
                        <li>No blogs yet!</li>
                    @endforelse
            </div>
        </div>
    </div>
</article>

@include('components.footer')

