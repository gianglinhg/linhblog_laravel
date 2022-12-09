@extends('global.layout.auth')
@section('auth_content')
    @auth
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="#" class="h1"><b>{{ $title }}</b></a>
                    @include('global.layout.message')
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Hãy đổi một mật khẩu mới đủ mạnh nhé</p>
                    <form action="{{ route('auth.post_password') }}" method="post">
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="old_password" placeholder="Mật khẩu cũ">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="new_password" placeholder="Mật khẩu mới">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="confirm-new_password"
                                placeholder="Xác nhận mật khẩu mới">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Thay đổi</button>
                            </div>
                            <!-- /.col -->
                        </div>
                        @csrf
                    </form>

                    <p class="mt-3 mb-1">
                        <a href="{{ route('auth.login') }}">Đăng nhập</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    @endauth
    @guest
        <section class="content mt-5">
            <div class="error-page">
                <h2 class="headline text-warning"> 404</h2>
                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Bạn chưa đăng nhập</h3>
                    <p>
                        Bạn có thể <a href="{{ route('auth.login') }}">Đăng nhập</a> để tiếp tục truy cập,
                        Nếu bạn chưa có tài khoản hãy <a href="{{ route('auth.register') }}">Đăng ký</a> để đến với chúng tôi
                    </p>
                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </section>
    @endguest
@endsection
