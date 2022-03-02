<div class="post-bibl">
    <a href="{{ route('posts.show', $post) }}">
        <p>{{ $post->created_at }}</p>
        <h3>*{{ $post->title }}</h3>
</div>
