<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head')
    <style>
        .main-title {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 3px;
        }

        .breadcrumb a {
            color: #333;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light row">
            <!-- Left navbar links -->
            <ul class="navbar-nav col-4">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Trang chủ</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('auth.password') }}" class="nav-link">Đổi mật khẩu</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('auth.logout') }}" class="nav-link">Đăng xuất</a>
                </li>
            </ul>
            <!-- Form Search -->
            <form class="form-block col-4" type="get" action="{{ route('admin.tin.search') }}">
                <div class="input-group input-group">
                    <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm">
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-info btn-flat">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </span>
                </div>
            </form>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item" style="font-size:12px">
                    <a class="nav-link" href="#" style="color: blue;">
                        @if (Auth::user()->id_group == 1)
                            Quản trị viên
                        @else
                            Thành viên
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.layout.sidebar')
        <!-- End Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="bg-gray main-title">{{ $title }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right ">
                                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">{{ $mainTitle }}</a></li>
                                <li class="breadcrumb-item"><a href="#">{{ $title }}</a></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- jquery validation -->
                            <div class="card card-primary">
                                <div class="main">
                                    @include('global.layout.message')
                                    @yield('content')
                                </div>
                                <div class="panigation mx-auto">
                                    @yield('paginate')
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">

                        </div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy;2022
                <a href="https://facebook.com/giangvanlinh2001">Giang Văn Linh</a>.
            </strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    @include('admin.layout.footer')
</body>

</html>
