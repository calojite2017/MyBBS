<header>
    <div id="Hd">
        {{-- タイトル --}}
        <div class="top-title">
            <h1><a href="{{ route('index') }}">My BBS</a></h1>
        </div>
        {{-- ログイン・ログアウトリンク --}}
        <div class="login-button__all">
            @if(Auth::check())
            <div class="logout-button">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"><span>ログアウト</span></button>
                </form>
            </div>
            @else
            <div class="login-button">
                <div class="login-button__register">
                    <a href="{{ route('register') }}">新規登録</a>
                </div>
                <div class="login-button__login">
                    <a href="{{ route('login') }}">ログイン</a>
                </div>
            </div>
            @endif
        </div>
        {{-- ハンバーガーメニュー --}}
        <div class="hamburger-menu">
            <input type="checkbox" id="menu-btn-check">
            <label for="menu-btn-check" class="menu-btn"><span></span></label>
            {{-- メニュー内容 --}}
            <div class="menu-content">
                <ul>
                    <li>
                        <a href="{{ route('index') }}">TOP</a>
                    </li>
                    <li>
                        <a href="{{ route('posts.index') }}">BBS</a>
                    </li>
                    <li>
                        <a href="{{ route('blogs.index') }}">Blog</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="#">News</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
