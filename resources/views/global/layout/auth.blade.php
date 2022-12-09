<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head')
</head>

<body class="container hold-transition login-page">
    @yield('auth_content')
    @include('admin.layout.footer')
</body>

</html>
