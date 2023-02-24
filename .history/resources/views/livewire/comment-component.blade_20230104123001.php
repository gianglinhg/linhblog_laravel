<div>
    @push('styles')
    <style>
        .media-left img {
            width: 60px;
            /* height: 60px; */
            border-radius: 50%;
        }

        .error {
            color: red;
            text-indent: 15px;
        }

        .btn-danger {
            padding: 2px 10px;
            border-radius: 2px;
            cursor: pointer;
        }

        .msg {
            color: #fff;
            padding: 2px 8px;
            border-radius: 2px;
        }
    </style>
    @endpush
    <div class="custombox clearfix comment">
        @if (Session::has('msg'))
        <p class="msg bg-success">{{ Session::get('msg') }}</p>
        @endif
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
                        {{-- {{dd($item->idCmt)}} --}}
                        @if (Auth::id() == $item->id_user)
                        <a onclick="return confirm('Bạn có chắc chắn xóa ?')"
                            wire:click.prevent='deleteComment({{$item->idCmt}})' class="btn-danger">Xóa</a>
                        @endif
                    </div>
                    @endforeach
                    {{-- <ul>
                        <li><a href="#"></a>Test</li>
                        <li><a href="#"></a>Test</li>
                    </ul> --}}
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
                    {{--
                </ul> --}}
                {{-- </div> --}}
            @endif
            <div class="col-lg-12">
                <form class="form-wrapper" wire:submit.prevent='comment'>
                    {{-- <input type="text" class="form-control" placeholder="Your name">
                    <input type="text" class="form-control" placeholder="Email address"> --}}
                    <textarea class="form-control" name="content" placeholder="Nội dung bình luận"
                        wire:model.defer='content'>{{ old('content') }}</textarea>
                    <button type="submit" class="btn btn-primary cu">Đăng</button>
                </form>
            </div>
        </div>
    </div>
    @endauth
    @guest
    {{-- <div class="message_cmt"> --}}
        <p>Bạn cần <a href="{{ route('auth.login') }}">đăng nhập</a> để tham gia bình luận</p>
        {{--
    </div> --}}
    @endguest
</div>