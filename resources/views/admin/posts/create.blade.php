<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('admin.posts.store', '#create') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agrega el titulo de tu publicacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input name="title" placeholder="Ingresa aqui el titulo de la publicacion" id="post-title"
                            class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                            required autocomplete="title" autofocus>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Crear publicacion</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        if (window.location.hash === "#create") {
            $('#modalCreate').modal('show');
        }

        $('#modalCreate').on('hide.bs.modal', function() {
            window.location.hash = "#";
            $('#post-title').val('');
            $('#post-title').removeClass('is-invalid');
        });

        $('#modalCreate').on('shown.bs.modal', function() {
            $('#post-title').focus();
            window.location.hash = "#create";
        });
    </script>
@endpush
