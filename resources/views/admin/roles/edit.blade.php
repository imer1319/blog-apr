@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Actualizar rol</h3>
                </div>
                <div class="card-body">
                    @include('partials.error-messages')
                    <form method="POST" action="{{ route('admin.roles.update', $role) }}">
                        @method('put')

                        @include('admin.roles.form')

                        <button class="btn btn-primary btn-block">Actualizar rol</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
