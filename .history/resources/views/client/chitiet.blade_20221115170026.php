@extends('client.layout.main')
@section('content')
<div class="page-wrapper">
  <div class="blog-title-area text-center">
      <ol class="breadcrumb hidden-xs-down">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Blog</a></li>
          <li class="breadcrumb-item active">{{$tin->tieuDe}}</li>
      </ol>

      <span class="color-orange"><a href="tech-category-01.html" title="">Technology</a></span>

      <h3>{{$tin->tieuDe}}</h3>

      <div class="blog-meta big-meta">
          <small><a href="tech-single.html" title="">{{date("d-m-Y", strtotime($tin->ngayDang))}}</a></small>
          <small><a href="tech-author.html" title="">by Jessica</a></small>
          <small><a href="#" title=""><i class="fa fa-eye"></i> {{$tin->xem}}</a></small>
      </div><!-- end meta -->

      <div class="post-sharing">
          <ul class="list-inline">
              <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
              <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
              <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
          </ul>
      </div><!-- end post-sharing -->
  </div><!-- end title -->

  <div class="single-post-media">
      <img src="upload/tech_menu_08.jpg" alt="" class="img-fluid">
  </div><!-- end media -->

  <div class="blog-content">
      
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
      <h4 class="small-title">You may also like</h4>
      <div class="row">
          <div class="col-lg-6">
              <div class="blog-box">
                  <div class="post-media">
                      <a href="tech-single.html" title="">
                          <img src="upload/tech_menu_04.jpg" alt="" class="img-fluid">
                          <div class="hovereffect">
                              <span class=""></span>
                          </div><!-- end hover -->
                      </a>
                  </div><!-- end media -->
                  <div class="blog-meta">
                      <h4><a href="tech-single.html" title="">We are guests of ABC Design Studio</a></h4>
                      <small><a href="blog-category-01.html" title="">Trends</a></small>
                      <small><a href="blog-category-01.html" title="">21 July, 2017</a></small>
                  </div><!-- end meta -->
              </div><!-- end blog-box -->
          </div><!-- end col -->

          <div class="col-lg-6">
              <div class="blog-box">
                  <div class="post-media">
                      <a href="tech-single.html" title="">
                          <img src="upload/tech_menu_06.jpg" alt="" class="img-fluid">
                          <div class="hovereffect">
                              <span class=""></span>
                          </div><!-- end hover -->
                      </a>
                  </div><!-- end media -->
                  <div class="blog-meta">
                      <h4><a href="tech-single.html" title="">Nostalgia at work with family</a></h4>
                      <small><a href="blog-category-01.html" title="">News</a></small>
                      <small><a href="blog-category-01.html" title="">20 July, 2017</a></small>
                  </div><!-- end meta -->
              </div><!-- end blog-box -->
          </div><!-- end col -->
      </div><!-- end row -->
  </div><!-- end custom-box -->

  <hr class="invis1">

</div>
@endsection