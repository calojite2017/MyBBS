@include('layouts.main')

@include('components.header')

<article>
    <div class="company-detail">
        <h1>お問い合わせ</h1>
        <div class="company-detail__contact__title">
            <h2><span>SHIBAKAWA BOOK STORE</span>は書籍のプロであることを自負しております。当店だからこそ、解決できる問題があります。</h2>
            <h2>ぜひ、お気軽にお問い合わせください。</h2>
        </div>
        {{-- フォームの送り先↓↓ --}}
        <form action="{{ route('contact.confirm') }}" method="POST" class="contact-detail__form" id="form1">
            @csrf
            <div class="form-kinds">
                <p>お問い合わせ項目</p>
                <div class="radio">
                    <input type="radio" id="buy" name="formkinds" value="書籍の購入" checked>
                    <label for="buy">書籍の購入</label>
                </div>
                <div class="radio">
                    <input type="radio" id="reserve" name="formkinds" value="書籍の予約">
                    <label for="reserve">書籍の予約</label>
                </div>
                <div class="radio">
                    <input type="radio" id="return" name="formkinds" value="書籍の返品">
                    <label for="return">書籍の返品</label>
                </div class="radio">
                <div class="radio">
                    <input type="radio" id="request" name="formkinds" value="当店への要望">
                    <label for="request">当店への要望</label>
                </div>
                <div class="radio">
                    <input type="radio" id="other" name="formkinds"  value="その他">
                    <label for="other">その他</label>
                </div>
            </div>
            <div class="form-value">
                <label for="body">
                    <p>お問い合わせ内容　<span>※必須</span></p>
                </label>
                    <textarea id="body" name="body" rows="5" cols="33">{{ old('body') }}</textarea>
                @error('body')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-detail">
                <label for="name">
                    <p>お名前　<span>※必須</span></p>
                </label>
                <input type="text" name="name" id="name"  value="{{ old('name') }}">
                @error('name')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-detail">
                <label for="kana">
                    <p>フリガナ</p>
                </label>
                <input type="text" name="kana" id="kana"  value="{{ old('kana') }}">
            </div>
            <div class="form-detail">
                <label for="mail">
                    <p>メールアドレス　<span>※必須</span></p>
                </label>
                <input type="text" name="mail" id="mail"  value="{{ old('mail') }}">
                @error('mail')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-detail">
                <label for="tel">
                    <p>お電話番号</p>
                </label>
                <input type="text" name="tel" id="tel" value="{{ old('tel') }}">
            </div>
            <div>
                <button form="form1" type="submit">確認</button>
            </div>
        </form>
    </div>

    <div class="information-detail__button">
        <ul>
            <li><a href="{{ route('index') }}">TOPへ戻る</a></li>
        </ul>
    </div>
</article>

@include('components.footer')
