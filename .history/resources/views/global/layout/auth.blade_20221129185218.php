<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head')
</head>

<body class="container hold-transition login-page">
    @yield('auth_content')
    @include('global.layout.message')
    <!-- /.login-box -->
    @include('admin.layout.footer')
    <!-- jQuery -->

</body>

</html>
