<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/admin" class="brand-link">
    <img src="/template/admin/dist/img/AdminLTELogo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">ADMIN BLOG</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2">
      </div>
      <div class="info">
        <a href="{{route('auth.dashboard')}}" class="d-block">Giang Văn Linh</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    {{-- <form class="form-inline" type="get" action="{{route('tin_search')}}"> --}}
      <div class="input-group" data-widget="sidebar-search">
      <div class="input-group">
        <input class="form-control form-control-sidebar" name="keyword" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar" type="submit">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul
        class="nav nav-pills nav-sidebar flex-column"
        data-widget="treeview"
        role="menu"
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
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>