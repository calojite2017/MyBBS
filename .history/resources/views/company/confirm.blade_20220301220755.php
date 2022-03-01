@include('layouts.main')

@include('components.header')

<article>
    <div class="confirm__all">
<div class="confirm__comment">
    <h2>以下の内容を送信してよろしいでしょうか。</h2>
</div>
<div class="confirm__detail">
    <form method="POST" action="{{ route('contact.store') }}">
        @csrf
        <h2>送信内容</h2>
        <ul>
            <div>
                <li>
                    <label>お問い合わせ項目</label>
                    <input type="hidden" name="formkinds" value="{{ $request->formkinds }}"><span>{{ $request->formkinds }}</span>
                </li>
            </div>
            <div>
                <li>
                    <label>お名前</label>
                    <input type="hidden" name="name" value="{{ $request->name }}">{{ $request->name }}
                </li>
            </div>
            <div>
                <li>
                    <label>フリガナ</label>
                    <input type="hidden" name="kana" value="{{ $request->kana }}">{{ $request->kana }}
                </li>
            </div>
            <div>
                <li>
                    <label>メールアドレス</label>
                    <input type="hidden" name="mail" value="{{ $request->mail }}">{{ $request->mail }}
                </li>
            </div>
            <div>
                <li>
                    <label>お電話番号</label>
                    <input type="hidden" name="tel" value="{{ $request->tel }}">{{ $request->tel }}
                </li>
            </div>
            <div>
                <li>
                    <label>お問い合わせ内容</label>
                    <p>
                        <input type="hidden" name="body" value="{{ $request->body }}">{!! nl2br($request->body) !!}
                    </p>
                </li>
            </div>
        </ul>
        <div class="form-button">
            <button type="submit" name="regist" value="送信" value="true">送信</button>
            <button type="submit" name="back" value="true">戻る</button>
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

