<header>
    <div id="Hd">
        {{-- タイトル --}}
        <div class="top-title">
            <h1><a href="{{ route('index') }}">My Blog</a></h1>
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
                        <a href="{{ route('posts.index') }}">On Board</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
