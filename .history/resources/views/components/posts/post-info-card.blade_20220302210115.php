<div class="po-bibl">
    <div class="news-bibl__image">
        <p><a href="{{ route('news.detail',$news->news_no) }}"><img src="{{ $news->image }}"
                    alt="{{ $news->title }}"></a></p>
    </div>
    <div class="news-bibl__title">
        <p><a href="{{ route('news.detail',$news->news_no) }}">{{ $news->title }}</a></p>
    </div>
</div>
