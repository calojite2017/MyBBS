<!DOCTIPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>My ブログ</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>My ブログ</h1>
        <ul>
            @forelse ($posts as $index => $post)
                <li>
                    <a href="/posts/{{ $index }}">
                      {{ $post }}
                    </a>
                </li>
            @empty
                <li>No posts yet!</li>
            @endforelse
        </ul>
    </div>
</body>
</html>
