{{-- @extends('auth')
@section('title')
  {{Auth::user()->name}}
@endsection --}}
@section('content')
  <p> Chào <b>{{Auth::user()->name}}</b></p>
    @auth
    <a href="{{route('password')}}" class="btn btn-primary">Đổi mật khẩu</a>
    <a href="{{route('logout')}}" class="btn btn-danger">Đăng xuất</a>
    @endauth
    {{-- @guest
    <a href="{{route('login')}}" class="btn btn-primary">Đăng nhập</a>
    <a href="{{route('register')}}" class="btn btn-danger">Đăng ký</a>
  @endguest --}}
@endsection