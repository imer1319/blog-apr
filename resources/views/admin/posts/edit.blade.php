@extends('admin.layout')

@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Crear publicacion</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Ver posts</a></li>
                    <li class="breadcrumb-item active">Crear post</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Crear posts</h3>
        </div>
        <div class="card-body">

            <div class="row">
                @if ($post->photos->count())
                    <div class="col-md-12">
                        <label>Imagenes</label>
                        <div class="row">
                            @foreach ($post->photos as $photo)
                                <div class="col-md-2">
                                    <form action="{{ route('admin.photos.destroy', $photo) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm position-absolute">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        <img src="{{ url($photo->url) }}" alt="" class="img-fluid">
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <form action="{{ route('admin.posts.update', $post) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label>Titulo</label>
                            <input name="title" placeholder="Ingresa aqui el titulo de la publicacion"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $post->title) }}" required autocomplete="title" autofocus>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Contenido de la publicacion</label>
                            <textarea name="body" rows="6" class="form-control @error('body') is-invalid @enderror"
                                placeholder="Contenido de la publicacion" required
                                autocomplete="body">{{ old('body', $post->body) }}</textarea>
                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Contenido embebido</label>
                            <textarea name="iframe" rows="2" class="form-control @error('iframe') is-invalid @enderror"
                                placeholder="Contenido embebido (iframe) de audio o video" required
                                autocomplete="iframe">{{ old('iframe', $post->iframe) }}</textarea>
                            @error('iframe')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Fecha de publicacion</label>
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" name="published_at"
                                    class="form-control @error('published_at') is-invalid @enderror"
                                    value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}"
                                    autocomplete="off">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                                @error('published_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Categorias</label>
                            <select name="category_id"
                                class="form-control select2 @error('category_id') is-invalid @enderror">
                                <option value="">Seleccione una categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $post->category_id) === $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select name="tags[]" class="select2" multiple="multiple"
                                data-placeholder="Selecciona una o mas etiquetas" style="width: 100%;">
                                @foreach ($tags as $tag)
                                    <option
                                        {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}
                                        value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Extracto de la publicacion</label>
                            <textarea name="excerpt" rows="3" class="form-control @error('excerpt') is-invalid @enderror"
                                placeholder="Extracto de la publicacion">{{ old('excerpt', $post->excerpt) }}</textarea>

                            @error('excerpt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Imagen</label>
                            <div class="dropzone"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Guardar publicacion</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <style>
        #datepicker {
            z-index: 9999 !important;
        }

        .datepicker {
            z-index: 9999 !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background: #1910a5;
        }

    </style>
@endpush

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>
        CKEDITOR.replace('body');
        CKEDITOR.config.height = 315;
        $('#datepicker').datepicker({
            format: 'mm/dd/yyyy',
            autoclose: true,
            startDate: '-3d'
        });

        $('.select2').select2({
            tags: true
        });

        let myDropzone = new Dropzone('.dropzone', {
            url: '/admin/posts/{{ $post->url }}/photos',
            paramName: 'photo',
            acceptedFiles: 'image/*',
            maxFilesize: 2,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            dictDefaultMessage: "Arrastra las fotos aquí para subirlas"
        });

        myDropzone.on('error', function(file, res) {
            let msg = res.photo[0];
            $('.dz-error-message:last > span').text(msg);
        });

        Dropzone.autoDiscover = false
    </script>
@endpush
