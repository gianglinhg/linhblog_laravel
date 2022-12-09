<style>
    .media-left img {
        /* width: 100px; */
        height: 100px;
        border-radius: 50%;
    }
</style>
<div class="custombox clearfix">

    <div class="row">
        <div class="col-lg-12">
            <div class="comments-list">
                <h4 class="small-title mb-2">Bình luận</h4>
                @foreach ($comment as $item)
                    <hr>
                    <div class="media ">
                        <a class="media-left" href="#">
                            <img src="/template/upload/images/avatar/chandung2.jpg">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading user_name">{{ $item->name }}
                                <small>{{ date('H:i:a d/m/Y', strtotime($item->created_at)) }}</small>
                            </h4>
                            <p>{{ $item->content }}</p>
                            {{-- <a href="#" class="btn btn-primary btn-sm">Reply</a> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
</div>
<!-- end custom-box -->

<hr class="invis1">
<div class="custombox clearfix">
    <h4 class="small-title">Bình luận bài viết</h4>
    <div class="row">
        <div class="col-lg-12">
            <form class="form-wrapper">
                {{-- <input type="text" class="form-control" placeholder="Your name">
                <input type="text" class="form-control" placeholder="Email address"> --}}
                <textarea class="form-control" placeholder="Nội dung bình luận"></textarea>
                <button type="submit" class="btn btn-primary">Đăng</button>
                @csrf
            </form>
        </div>
    </div>
</div>
