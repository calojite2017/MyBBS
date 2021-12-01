<footer>
    <div id="Ft">
        <img src="{{ asset('images/logo.jpg') }}">
        <div class="company-info">
            <ul>
                <li>所在地　〒{{ $c_post->value }} <a href="javascript:;" onclick="window.open('http://maps.google.co.jp/maps?q='+encodeURI('{{ $c_address->value }}'));return false;">{{ $c_address->value }}</a></li>
                <a href=""><li>プライバシーポリシー</li></a>
                <a href=""><li>会社概要</li></a>
            </ul>
        </div>
    </div>
</footer>
