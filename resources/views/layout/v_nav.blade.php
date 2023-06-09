<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        <li class="nav-header">MENU</li>
        <li class="{{ request()->is('/') ? 'active' : '' }}">
            <a href="/" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Home</p>
            </a>
        </li>
        <li class="{{ request()->is('laporan') ? 'active' : '' }}">
            <a href="/laporan" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>Laporan</p>
            </a>
        </li>
        <li class="{{ request()->is('kontrol') ? 'active' : '' }}">
            <a href="/kontrol" class="nav-link">
                <i class="nav-icon fas fa-ellipsis-h"></i>
                <p>Kontrol Manual</p>
            </a>
        </li>
    </ul>
</nav>
