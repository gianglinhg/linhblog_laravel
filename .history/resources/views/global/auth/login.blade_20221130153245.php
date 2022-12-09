@extends('global.layout.auth')
@section('auth_content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>{{ $title }}</b></a>
                @include('global.layout.alert')
                @include('global.layout.message')
            </div>
            <div class="card-body">
                <p class="login-box-msg">Đã lâu không gặp, Chào mừng !</p>
                <form action="{{ route('auth.post_login') }}" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">
                                    Ghi nhớ tôi
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    @csrf
                </form>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="#">Quên mật khẩu</a>
                </p>
                <div class="row">

                    <p class="mb-1">
                        <a href="{{ route('auth.register') }}">Đăng ký thành viên</a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('auth.register') }}">Đăng ký thành viên</a>
                    </p>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
