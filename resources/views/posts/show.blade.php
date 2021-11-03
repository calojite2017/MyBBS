<x-layout>
    <x-slot name="title">
        {{ $post }} - My ブログ
    </x-slot>

    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">もどる</a>
    </div>

    <h1>{{ $post }}</h1>
</x-layout>
