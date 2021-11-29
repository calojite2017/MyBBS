@extends('layouts.main')

@section('title','Add Board!')

@section('content')
<article>
    <div class="board contents">
        <div class="common-title">
            <h1>Add Board!</h1>
        </div>

        <div class="board-form">
            <form method="post" action="{{ route('posts.store') }}">
                @csrf
                <div class="form-group">
                    <label>
                        Title
                        <input type="text" name="title" value="{{ old('title') }}">
                    </label>
                    @error('title')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>
                        Name
                        <input type="text" name="name" value="{{ old('name') }}">
                    </label>
                    @error('title')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>
                        Body
                        <textarea name="body">{{ old('body') }}</textarea>
                    </label>
                    @error('body')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-button">
                    <button>Add</button>
                </div>
            </form>
        </div>

        <div class="common-back-link">
            &laquo; <a href="{{ route('posts.index') }}">もどる</a>
        </div>
    </div>
</article>
@endsection
