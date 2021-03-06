@extends('layout')

@section('content')
    <section class="posts container">
        @if (isset($title))
            <h3>{{ $title }}</h3>
        @endif
        @forelse ($posts as $post)
            <article class="post">

                @include( $post->viewType('home') )

                <div class="content-post">

                    @include('posts.header')

                    <h1>{{ $post->title }}</h1>

                    <div class="divider"></div>

                    <p>{{ $post->excerpt }}</p>

                    <footer class="container-flex space-between">
                        <div class="read-more">
                            <a href="{{ route('blog.show', $post->url) }}" class="text-uppercase c-green">Leer mas</a>
                        </div>
                        @include('posts.tags')
                    </footer>
                </div>
            </article>
        @empty
        <article class="post">

            <div class="content-post">

                <h1>No hay publicaciones</h1>

            </div>
        </article>
        @endforelse
    </section>

    <div>
        {{ $posts->appends(request()->all())->links() }}
    </div>
@endsection
