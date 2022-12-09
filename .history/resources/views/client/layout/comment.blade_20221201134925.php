<style>
    .media-left img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
    }

    .error {
        color: red;
        text-indent: 15px;
    }

    .btn-danger {
        padding: 2px 10px;
        border-radius: 2px;
    }

    .msg {
        color: #fff;
        text-indent: 12px;
    }
</style>
<div class="custombox clearfix">
    {{-- @if (Session::has('msg')) --}}
    {{-- <p class="success-text">{{ Session::get('msg') }}</p> --}}
    <p class="msg bg-success">Ngày gì</p>
    {{-- @endif --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="comments-list">
                <h4 class="small-title mb-2">Bình luận</h4>
                @foreach ($comment as $item)
                    <hr>
                    <div class="media ">
                        <a class="media-left" href="#">
                            <img src="/template/{{ $item->avatar }}">
                            {{-- <img src="{{ asset('/template' / $item->avatar) }}"> --}}
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading user_name">{{ $item->name }}
                                <small>{{ date('H:i:a d/m/Y', strtotime($item->created_at)) }}</small>
                            </h4>
                            <p>{{ $item->content }}</p>
                            {{-- <a href="#" class="btn btn-primary btn-sm">Reply</a> --}}
                        </div>
                        @if (Auth::id() == $item->id_user)
                            <a onclick="return confirm('Bạn có chắc chắn xóa ?')"
                                href="{{ route('auth.deleteCmt', ['id' => $item->id]) }}" class="btn-danger">Xóa</a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
</div>
<!-- end custom-box -->

<hr class="invis1">

@auth
    <div class="custombox clearfix">
        <h4 class="small-title">Bình luận bài viết</h4>
        <div class="row">
            @if ($errors->any())
                {{-- <div class="alert alert-danger"> --}}
                {{-- <ul> --}}
                @foreach ($errors->all() as $error)
                    <span class="error">{{ $error }}</span>
                @endforeach
                {{-- </ul> --}}
                {{-- </div> --}}
            @endif
            <div class="col-lg-12">
                <form class="form-wrapper" action="{{ route('auth.comment') }}" method="POST">
                    {{-- <input type="text" class="form-control" placeholder="Your name">
                <input type="text" class="form-control" placeholder="Email address"> --}}
                    <textarea class="form-control" name="content" placeholder="Nội dung bình luận"></textarea>
                    <button type="submit" class="btn btn-primary">Đăng</button>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endauth
@guest
    {{-- <div class="message_cmt"> --}}
    <p>Bạn cần <a href="{{ route('auth.login') }}">đăng nhập</a> để tham gia bình luận</p>
    {{-- </div> --}}
@endguest
