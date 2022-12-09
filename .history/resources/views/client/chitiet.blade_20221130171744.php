@extends('client.layout.index')
@push('head')
    <style>
        .blog-content img {
            width: 100%;
        }
    </style>
@endpush
@section('content')
    <div class="page-wrapper">
        <div class="blog-title-area text-center">
            <ol class="breadcrumb hidden-xs-down">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                <li class="breadcrumb-item active">{{ $tin->tieuDe }}</li>
            </ol>

            <span class="color-orange"><a href="#" title="">{{ $tin->ten }}</a></span>

            <h3>{{ $tin->tieuDe }}</h3>

            <div class="blog-meta big-meta">
                <small><a href="tech-single.html" title="">{{ date('d-m-Y', strtotime($tin->ngayDang)) }}</a></small>
                <small><a href="#" title=""><i class="fa fa-eye"></i> {{ $tin->xem }}</a></small>
            </div><!-- end meta -->

            <div class="post-sharing">
                <ul class="list-inline">
                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                                class="down-mobile">Chia sẻ qua Facebook</span></a></li>
                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                class="down-mobile">Chia sẻ qua Twitter</span></a></li>
                    <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div><!-- end post-sharing -->
        </div><!-- end title -->

        <div class="single-post-media">
            <img src="upload/tech_menu_08.jpg" alt="" class="img-fluid">
        </div><!-- end media -->

        <div class="blog-content">
            {!! $tin->noiDung !!}
        </div><!-- end content -->

        <div class="row">
            <div class="col-lg-12">
                <div class="banner-spot clearfix">
                    <div class="banner-img">
                        <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                    </div><!-- end banner-img -->
                </div><!-- end banner -->
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="invis1">

        <div class="custombox clearfix">
            <h4 class="small-title">3 Comments</h4>
            <div class="row">
                <div class="col-lg-12">
                    <div class="comments-list">
                        @foreach ($comment as $item)
                            <div class="media last-child">
                                <a class="media-left" href="#">
                                    <img src="upload/author_02.jpg" alt="" class="rounded-circle">
                                </a>
                                <div class="media-body">

                                    <h4 class="media-heading user_name">{{ $item->name }}
                                        <small>{{ date('H:i:a d/m/Y', strtotime($item->created_at)) }}</small>
                                    </h4>
                                    <p>{{ $item->content }}</p>
                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
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
            <h4 class="small-title">Leave a Reply</h4>
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-wrapper">
                        <input type="text" class="form-control" placeholder="Your name">
                        <input type="text" class="form-control" placeholder="Email address">
                        <input type="text" class="form-control" placeholder="Website">
                        <textarea class="form-control" placeholder="Your comment"></textarea>
                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
