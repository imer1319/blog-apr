<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-header">NAVEGACION</li>
    <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>Inicio</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Blog
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.posts.index') }}"
                    class="nav-link {{ request()->routeIs('admin.posts.index') ? 'active' : '' }}">
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
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
            </p>
        </a>
    </li>
</ul>
