@extends('layouts.main')

@section('title','確認ページ')

@section('content')

<article>
    <div class="send__contents">
        <h2>以下の内容を送信しました。</h2>
        <div class="send__contents__body">
            <ul>
                <li>
                    <label>お名前</label><span>&#65306</span>{{ session('name') }}様
                </li>
                <li>
                    <label>お問い合わせ内容</label><span></span>
                </li>
                <p>{!! nl2br(session('body')) !!}</p>
            </ul>
        </div>
    </div>

    <div class="information-detail__button">
        <ul>
            <li><a href="{{ route('index') }}">TOPへ戻る</a></li>
        </ul>
    </div>
</article>
@endsection
