@extends('client.layout.main')
@section('banner')
  @include('client.layout.banner')
@endsection
@section('content')
<div class="page-wrapper">
  <div class="blog-top clearfix">
      <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
  </div><!-- end blog-top -->
  <div class="blog-list clearfix">
    @foreach
      <div class="blog-box row">
          <div class="col-md-4">
              <div class="post-media">
                  <a href="tech-single.html" title="">
                      <img src="/template/client/upload/tech_blog_01.jpg" alt="" class="img-fluid">
                      <div class="hovereffect"></div>
                  </a>
              </div><!-- end media -->
          </div><!-- end col -->

          <div class="blog-meta big-meta col-md-8">
              <h4><a href="tech-single.html" title="">{{$moinhat->tieuDe}}</p>
              <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html" title="">Gadgets</a></small>
              <small><a href="tech-single.html" title="">21 July, 2017</a></small>
              <small><a href="tech-author.html" title="">by Matilda</a></small>
              <small><a href="tech-single.html" title=""><i class="fa fa-eye"></i> 1114</a></small>
          </div><!-- end meta -->
      </div><!-- end blog-box -->

      @endforeach

      <hr class="invis">
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
              <h4><a href="tech-single.html" title="">Applications for taking photos of nature in your mobile phones</a></h4>
              <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
              <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html" title="">Design</a></small>
              <small><a href="tech-single.html" title="">19 July, 2017</a></small>
              <small><a href="tech-author.html" title="">by Matilda</a></small>
              <small><a href="tech-single.html" title=""><i class="fa fa-eye"></i> 4441</a></small>
          </div><!-- end meta -->
      </div><!-- end blog-box -->
      <hr class="invis">
      <!-- end blog-box -->
  </div><!-- end blog-list -->
</div>
@endsection