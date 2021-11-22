<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=1">
    {{-- フォント指定 --}}
    <link href="https://fonts.googleapis.com/css?family=BioRhyme+Expanded" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:700" rel="stylesheet">
    {{-- CSS読み込み --}}
    <link rel="stylesheet" type="text/css" media="screen and (min-width:961px),print" href="{{ asset('css/style_pc.css') }}">
    <link rel="stylesheet" type="text/css" media="screen and (max-width:960px)" href="{{ asset('css/style_sp.css') }}">
    <link rel="stylesheet" type="text/css" media="screen,print" href="{{ asset('css/style.css') }}">
    {{-- タイトル --}}
    @hasSection ('title')
    <title>@yield('title') | My Blog</title>
    @else
    <title>My Blog</title>
    @endif
</head>

<body>
    <x-header />
    @yield('content')
    <x-footer />
</body>
</html>

