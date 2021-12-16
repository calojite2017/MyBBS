@extends('layouts.main')

@section('title',$news->title)

@section('content')
<article>
    <div class="detail-property">
        <div class="detail-property__image">
            <img src="{{ $news->image }}" alt="{{ $news->title }}" />
        </div>
        <div class="detail-property__document--title">
            <h2>{{ $news->title }}</h2>
        </div>
        <div class="detail-property__document--text">
            <p>{{ $news->content }}</p>
        </div>
    </div>
    <div class="detail-series">
        <x-headline />
        <div class="news-single">
            @each('components.news.sales-info-card', $news_sales_info_list, 'news')
        </div>
    </div>
</article>
@endsection
