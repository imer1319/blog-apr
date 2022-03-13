<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-header">NAVEGACION</li>
    <li class="nav-item {{ setActiveRoute('dashboard') }}">
        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>Inicio</p>
        </a>
    </li>
    <li class="nav-item {{ menuOpen(['admin.posts.index','admin.posts.create']) }}">
        <a href="#" class="nav-link {{ setActiveRoute('admin.posts.index') }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Blog
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.posts.index') }}"
                    class="nav-link {{ setActiveRoute('admin.posts.index') }}">
                    <i class="far fa-eye nav-icon"></i>
                    <p>Ver todos los post</p>
                </a>
            </li>
            <li class="nav-item">
                @if (request()->is('admin/posts/*'))
                    <a href="{{ route('admin.posts.index', '#create') }}" class="nav-link">
                        <i class="fas fa-pencil-alt nav-icon"></i>
                        <p>Crear un post</p>
                    </a>
                @else
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#modalCreate">
                        <i class="fas fa-pencil-alt nav-icon"></i>
                        <p>Crear un post</p>
                    </a>
                @endif
            </li>
        </ul>
    </li>
    <li class="nav-item {{ menuOpen(['admin.users.index','admin.users.create']) }}">
        <a href="#" class="nav-link {{ setActiveRoute(['admin.users.index','admin.users.create']) }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item {{ setActiveRoute('admin.users.index') }}">
                <a href="{{ route('admin.users.index') }}"
                    class="nav-link {{ setActiveRoute('admin.users.index') }}">
                    <i class="far fa-eye nav-icon"></i>
                    <p>Ver todos los usuarios</p>
                </a>
            </li>
            <li class="nav-item {{ setActiveRoute('admin.users.create') }}">
                <a href="{{ route('admin.users.create') }}" class="nav-link"><i class="fas fa-pencil-alt nav-icon"></i>
                    <p>Crear un usuario</p>
                </a>
            </li>
        </ul>
    </li>
</ul>
