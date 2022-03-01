@include('layouts.main')

@include('components.header')

<article>
    <div class="company-contents">
        <h1>{{ $company->title }}</h1>
        <p>{!! nl2br($company->value) !!}</p>
    </div>
</article>

@include('components.footer')
