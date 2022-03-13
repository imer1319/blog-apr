@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Datos personales</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <ul class="list-group">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @method('PUT') @csrf

                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input name="name" value="{{ old('name', $user->name) }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input name="email" value="{{ old('email', $user->email) }}" type="email"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input name="password" type="password" class="form-control" placeholder="Contraseña">
                            <span class="form-text text-muted">Dejar en blanco si no quieres cambiar la contraseña</span>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Repita la contraseña:</label>
                            <input name="password_confirmation" type="password" class="form-control"
                                placeholder="Repita la contraseña">
                        </div>

                        <button class="btn btn-primary btn-block">Actualizar usuario</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Roles y permisos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.roles.update', $user) }}" method="POST">
                        @csrf @method('put')
                        @foreach ($roles as $id => $name)
                            <div class="checkbox">
                                <label>
                                    <input name="roles[]" type="checkbox" value="{{ $name }}"
                                        {{ $user->roles->contains($id) ? 'checked' : '' }}>
                                    {{ $name }}
                                </label>
                            </div>
                        @endforeach
                        <button class="btn btn-primary btn-block">Actualizar roles</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
