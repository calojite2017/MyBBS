@include('layouts.main')



@section('title','TOP')

@section('content')
<article>
    <div class="toppage-contents">
        <div class="top-image">
        </div>
        <div class="toppage-contents__menu">
            <div class="top-menu">
                <div class="top-board anime1 top-menu__hover">
                    <a href="{{ route('posts.index') }}"><span>BBS</span></a>
                </div>
                <div class="top-blog anime2 top-menu__hover">
                    <a href="{{ route('blogs.index') }}"><span>BLOG</span></a>
                </div>
                <div class="top-contact anime1 top-menu__hover">
                    <a href="#"><span>CONTACT</span></a>
                </div>
                <div class="top-news anime2 top-menu__hover">
                    <a href="#"><span>NEWS</span></a>
                </div>
            </div>
            <div class="top-category">
            </div>
        </div>
        <div class="news-list">
            <h1>News-list</h1>
        </div>
        <div class="news-single">
            @each('components.news.sales-info-card', $news_list, 'news')
        </div>
    </div>
</article>
@endsection
