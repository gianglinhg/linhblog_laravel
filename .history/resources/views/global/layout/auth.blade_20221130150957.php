<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head')
</head>

<body class="container hold-transition login-page">
    @include('global.layout.alert')
    @yield('auth_content')
    <!-- /.login-box -->
    @include('admin.layout.footer')
    <!-- jQuery -->

</body>

</html>
