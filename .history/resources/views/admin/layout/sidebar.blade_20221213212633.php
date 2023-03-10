<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="/template/admin/dist/img/AdminLTELogo.png" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">ADMIN BLOG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/template/{{ Auth::user()->avatar }}" class="img-circle elevation-2">
                {{-- {{ dd(Auth::user()->avatar) }} --}}
            </div>
            <div class="info">
                <a href="{{ route('auth.dashboard') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <form class="form-inline" type="get" action="{{route('tin_search')}}"> --}}
        <div class="input-group" data-widget="sidebar-search">
            <div class="input-group">
                <input class="form-control form-control-sidebar" name="keyword" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar" type="submit">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
            </form>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="/admin" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    @if (Auth::user()->id_group == 1)
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-apple-alt"></i>
                                <p>
                                    Lo???i tin
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/loaitin/add" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Th??m danh m???c</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/loaitin/list" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh s??ch danh m???c</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Tin t???c
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/tin/add" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Th??m tin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/tin/list" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh s??ch tin</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-alt"></i>
                                <p>
                                    T??i kho???n
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.list') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh s??ch t??i kho???n</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <ul class="navbar-nav">
                        <li class="nav-item d-sm-inline-block">
                            <a href="/" class="nav-link">Trang ch???</a>
                        </li>
                        <li class="nav-item d-sm-inline-block">
                            <a href="{{ route('auth.password') }}" class="nav-link">?????i m???t kh???u</a>
                        </li>
                        <li class="nav-item d-sm-inline-block">
                            <a href="{{ route('auth.logout') }}" class="nav-link">????ng xu???t</a>
                        </li>
                    </ul>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
</aside>
