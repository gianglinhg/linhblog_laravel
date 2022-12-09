@extends('client.layout.main')
@section('banner')
  @include('client.layout.banner')
@endsection
@section('content')
<div class="page-wrapper">
  <div class="blog-top clearfix">
      <h4 class="pull-left">Tin mới nhất <a href="#"><i class="fa fa-rss"></i></a></h4>
  </div><!-- end blog-top -->
  <div class="blog-list clearfix">
    @foreach($moinhat as $tin)
    <div class="blog-box row">
        <div class="col-md-4">
            <div class="post-media">
                <a href="tech-single.html" title="">
                    <img src="/template/client/upload/tech_blog_04.jpg" alt="" class="img-fluid">
                    <div class="hovereffect"></div>
                </a>
            </div><!-- end media -->
        </div><!-- end col -->

        <div class="blog-meta big-meta col-md-8">
            <h4><a href="{{ url('/tin',[$tin->id]); }}" title="">{{$tin->tieuDe}}</a></h4>
            <p>{{$tin->tomTat}}</p>
            <small class="firstsmall"><a class="bg-orange" href="#" title="">{{$name}}</a></small>
            <small><a href="{{ url('/tin',[$tin->id]); }}" title="">{{date("d-m-Y", strtotime($tin->ngayDang))}}</a></small>
            {{-- <small><a href="#" title="">by LinhG</a></small> --}}
            <small><a href="#" title=""><i class="fa fa-eye"></i> {{$tin->xem}}</a></small>
        </div><!-- end meta -->
    </div><!-- end blog-box -->

    <hr class="invis">
    @endforeach

      <div class="row">
          <div class="col-lg-10 offset-lg-1">
              <div class="banner-spot clearfix">
                  <div class="banner-img">
                      <img src="/template/client/upload/banner_02.jpg" alt="" class="img-fluid">
                  </div><!-- end banner-img -->
              </div><!-- end banner -->
          </div><!-- end col -->
      </div><!-- end row -->
      <hr class="invis">
      <div class="blog-top clearfix">
        <h4 class="pull-left">Tin xem nhiều <a href="#"><i class="fa fa-rss"></i></a></h4>
    </div><!-- end blog-top -->
      @foreach($xemnhieu as $tin)
      <div class="blog-box row">
          <div class="col-md-4">
              <div class="post-media">
                  <a href="tech-single.html" title="">
                      <img src="/template/client/upload/tech_blog_04.jpg" alt="" class="img-fluid">
                      <div class="hovereffect"></div>
                  </a>
              </div><!-- end media -->
          </div><!-- end col -->

          <div class="blog-meta big-meta col-md-8">
              <h4><a href="{{ url('/tin',[$tin->id]); }}" title="">{{$tin->tieuDe}}</a></h4>
              <p>{{$tin->tomTat}}</p>
              <small class="firstsmall"><a class="bg-orange" href="#" title="">{{$name}}</a></small>
              <small><a href="{{ url('/tin',[$tin->id]); }}" title="">{{date("d-m-Y", strtotime($tin->ngayDang))}}</a></small>
              {{-- <small><a href="#" title="">by LinhG</a></small> --}}
              <small><a href="#" title=""><i class="fa fa-eye"></i> {{$tin->xem}}</a></small>
          </div><!-- end meta -->
      </div><!-- end blog-box -->
      <hr class="invis">
      @endforeach
      <!-- end blog-box -->
  </div><!-- end blog-list -->
</div>
@endsection