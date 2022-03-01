@extends('layout')

@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)

@section('content')
    <article class="post container">
        @include( $post->viewType() )
        <div class="content-post">

            @include('posts.header')

            <h1>{{ $post->title }}</h1>
            <div class="divider"></div>
            {!! $post->body !!}
            <footer class="container-flex space-between">
                <div class="buttons-social-media-share">
                    @include('partials.social-links', ['description' => $post->title])
                </div>

                @include('posts.tags')

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
