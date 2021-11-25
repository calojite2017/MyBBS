@extends('layouts.main')

@section('title','Add Board!')

@section('content')
<article>
    <div class="board contents">
        <div class="common-title">
            <h1>Add Board!</h1>
        </div>

        <div class="board-form">
            <form method="post" action="">
                @csrf
                <div class="form-group">
                    <label>
                        Title
                        <input type="text" name="title">
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        Body
                        <textarea name="body"></textarea>
                    </label>
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
