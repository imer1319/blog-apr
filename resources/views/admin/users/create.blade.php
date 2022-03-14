@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Datos personales</h3>
                </div>
                <div class="card-body">
                    @include('partials.error-messages')
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input name="email" value="{{ old('email') }}" type="email" class="form-control">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Roles</label>
                                @include('admin.roles.checkboxes')
                            </div>
                            <div class="form-group col-md-6">
                                <label>Permisos</label>
                                @include('admin.permissions.checkboxes', ['model' => $user])
                            </div>
                        </div>
                        <small class="text-muted">La contraseña sera generada y enviada vía email</small>
                        <button class="btn btn-primary btn-block">Crear usuario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
