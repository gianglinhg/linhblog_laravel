@php
    $loaitin = DB::table('loaitin')
        ->orderBy('thuTu')
        ->where('anHien', '=', 1)
        ->limit(8)
        ->get();
@endphp
<div class="container-fluid">
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/"><img src="images/version/tech-logo.png" alt=""></a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Trang chủ</a>
                </li>
                {{-- {{dd($loaitin)}} --}}
                @foreach ($loaitin as $item)
                    <li class="nav-item">
                        <a class="nav-link" href="">{{ $item->ten }}</a>
                    </li>
                @endforeach
            </ul>
            <ul class="navbar-nav mr-2">
                <form class="form" type="get" action="{{ route('client.search') }}">
                    <div class="input-group input-group">
                        <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm tin tức">
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-primary btn-flat" style="cursor:pointer">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </ul>
            <ul class="navbar-nav mr-2 ml-2">
                @auth
                    <li class="nav-item">
                        @if (Auth::user()->id_group == 1)
                            <a class="nav-link" href="{{ route('admin.') }}">
                                <i class="fa-solid fa-lock"></i>
                            </a>
                        @else
                            <a class="nav-link" href="{{ route('auth.dashboard') }}">
                                <i class="fa-solid fa-address-card"></i>
                            </a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.logout') }}">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </a>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.login') }}">
                            <i class="fa-solid fa-user"></i>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.register') }}">
                            <i class="fa-solid fa-user-plus"></i>
                        </a>
                    </li> --}}
                @endguest
            </ul>
        </div>
    </nav>
</div>
