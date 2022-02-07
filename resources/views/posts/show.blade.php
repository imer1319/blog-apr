@extends('layout')

@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)

@section('content')
    <article class="post container">
        @if ($post->photos->count() === 1)
            <figure><img src="{{ $post->photos->first()->url }}" class="img-responsive" alt=""></figure>
        @elseif ($post->photos->count() > 1)
            @include('posts.carousel')
        @elseif ($post->iframe)
            <div class="video">
                {!! $post->iframe !!}
            </div>
        @endif
        <div class="content-post">
            <header class="container-flex space-between">
                <div class="date">
                    <span class="c-gris">{{ $post->published_at->format('M d') }}</span>
                </div>
                <div class="post-category">
                    <span class="category">{{ $post->category->name }}</span>
                </div>
            </header>
            <h1>{{ $post->title }}</h1>
            <div class="divider"></div>
            {!! $post->body !!}
            <footer class="container-flex space-between">
                <div class="buttons-social-media-share">
                    @include('partials.social-links', ['description' => $post->title])
                </div>
                <div class="tags container-flex">
                    @foreach ($post->tags as $tag)
                        <span class="tag c-gris">#{{ $tag->name }}</span>
                    @endforeach
                </div>
            </footer>
            <div class="comments">
                <div class="divider"></div>
                <div id="disqus_thread"></div>
                @include('partials.disqus-script')

            </div><!-- .comments -->
        </div>
    </article>
@endsection

@push('scripts')
    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
@endpush
