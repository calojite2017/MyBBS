@include('layouts.main')

@include('components.header')

<article>
    <div class="news-detail">
        <div class="detail-property">
            <div class="detail-property__image">
                <img src="{{ $news->image }}" alt="{{ $news->title }}" />
            </div>
            <div class="detail-property__contents">
                <h2>{{ $news->title }}</h2>
                <p>{!! ($news->content) !!}</p>
            </div>
        </div>
        <div class="news-single">
            @each('components.news.news-info-card', $news_list, 'news')
        </div>
    </div>
</article>

@include('components.footer')
