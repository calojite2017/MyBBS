<x-layout>
    <x-slot name="title">
        My ブログ
    </x-slot>

    <h1>My ブログ</h1>
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
</x-layout>
