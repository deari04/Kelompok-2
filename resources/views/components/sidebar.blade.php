<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link text-center text-white">
        <span class="brand-text font-weight-bold">In Dorm</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
            <div class="info">
                @auth
                <a class="d-block">{{ Auth::user()->name }}</a>
                @else
                <a class="d-block">Guest</a>
                @endauth
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <a href="{{route('dashboard')}}" class="nav-link {{Request::routeIs('dashboard') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item menu-open">
                <a href="{{route('dataKamar')}}" class="nav-link {{Request::routeIs('dataKamar') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-solid fa-door-open"></i>
                    <p>Data Kamar</p>
                </a>
            </li>
            <li class="nav-item menu-open">
                <a href="{{route('dataPenghuni')}}" class="nav-link {{Request::routeIs('dataPenghuni') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-solid fa-house-user"></i>
                    <p>Data Penghuni</p>
                </a>
            </li>
            <li class="nav-item menu-open">
                <a href="{{route('pemesanan.index')}}" class="nav-link {{Request::routeIs('pemesanan.index') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-solid fa-file-invoice"></i>
                    <p>Pemesanan</p>
                </a>
            </li>
            <li class="nav-item menu-open">
                <a href="{{route('riwayat')}}" class="nav-link {{Request::routeIs('riwayat') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-solid fa-clock"></i>
                    <p>Riwayat</p>
                </a>
            </li>
            <li class="nav-item menu-open">
                <a href="{{route('kelolaAkun')}}" class="nav-link {{Request::routeIs('kelolaAkun') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-solid fa-user-check"></i>
                    <p>Kelola Akun</p>
                </a>
            </li>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
