
<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.layout.head')
</head>
<body class="">
  @yield('auth_dashboard')
  <div class="container hold-transition login-page">
    @yield('auth_content')
  </div>
<!-- /.login-box -->
 @include('admin.layout.footer')
<!-- jQuery -->

</body>
</html>
