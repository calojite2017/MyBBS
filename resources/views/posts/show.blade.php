<!DOCTIPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>My ブログ</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
</head>
<body>
    <div class="container">
    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">もどる</a>
    </div>

        <h1>{{ $post }}</h1>
    </div>
</body>
</html>
