<div class="custombox clearfix">
    {{-- <h4 class="small-title">3 Comments</h4> --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="comments-list">
                @foreach ($comment as $item)
                    <div class="media ">
                        <a class="media-left" href="#">
                            <img src="upload/author_02.jpg" alt="" class="rounded-circle">
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