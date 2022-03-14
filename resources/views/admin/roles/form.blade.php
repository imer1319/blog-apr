@csrf
<div class="form-group">
    <label>Identificador:</label>
    @if ($role->exists)
        <input value="{{ $role->name }}" class="form-control" disabled>
    @else
        <input name="name" value="{{ old('name', $role->name) }}" class="form-control">
    @endif
</div>

<div class="form-group">
    <label for="display_name">Nombre:</label>
    <input name="display_name" value="{{ old('display_name', $role->display_name) }}" type="text"
        class="form-control">
</div>

<div class="row">
    <div class="form-group col-md-6">
        <label>Permisos</label>
        @include('admin.permissions.checkboxes', ['model' => $role])
    </div>
</div>
