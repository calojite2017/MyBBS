@extends('layouts.main')

@section('title','Edit BBS')

@section('content')
<article>
    <div class="board contents">
        <div class="common-title">
            <h1>Edit BBS</h1>
        </div>

        <div class="board-form">
            <form method="post" action="{{ route('posts.update', $post) }}">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label>
                        Title
                        <input type="text" name="title" value="{{ old('title', $post->title) }}">
                    </label>
                    @error('title')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>
                        Name
                        <input type="text" name="name" value="{{ old('name', $post->name) }}">
                    </label>
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>
                        Body
                        <textarea name="body">{{ old('body', $post->body) }}</textarea>
                    </label>
                    @error('body')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-button">
                    <button>Update</button>
                </div>
            </form>
        </div>

        <div class="common-back-link">
            &laquo; <a href="{{ route('posts.show', $post) }}">もどる</a>
        </div>
    </div>
</article>
@endsection
