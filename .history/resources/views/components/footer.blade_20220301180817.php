<body>
<footer>
    <div id="Ft">
        {{-- <img src="{{ asset('images/logo.jpg') }}"> --}}
        <div class="news-list">
            <h1>My BBS</h1>
        </div>
        <div class="company-info">
            <ul>
                <li>所在地　〒{{ $c_post->value }} <a href="javascript:;" onclick="window.open('http://maps.google.co.jp/maps?q='+encodeURI('{{ $c_address->value }}'));return false;">{{ $c_address->value }}</a></li>
                <li class="company-info__link"><a href="{{ route('company', ['id' => $privacy->id]) }}">プライバシーポリシー</a></li>
                <li class="company-info__link"><a href="{{ route('company', ['id' => $company->id]) }}">会社概要</a></li>
            </ul>
        </div>
    </div>
</footer>
