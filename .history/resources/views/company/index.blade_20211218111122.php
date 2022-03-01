@extends('layouts.main')

@section('title', $company->title)

@section('content')
<article>
    <div class="company-contents">
        <h1>{{ $company->title }}</h1>
        <p>{!! nl2br($company->value) !!}</p>
    </div>
</article>
@endsection
