<div class="widget">
  <div class="banner-spot clearfix">
      <div class="banner-img">
          <img src="/template/client/images/wc.jpg" alt="" class="img-fluid">
      </div><!-- end banner-img -->
  </div><!-- end banner -->
</div><!-- end widget -->

<div class="widget">
  <h2 class="widget-title">Popular Posts</h2>
  <div class="blog-list-widget">
      <div class="list-group">
        @foreach($haynhat as $item)
          <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
              <div class="w-100 justify-content-between">
                  <img src="/template/{{$item->urlHinh}}" alt="" class="img-fluid float-left">
                  <h5 class="mb-1">{{$item->tieuDe}}</h5>
                  <small>{{$item->ngayDang}}</small>
              </div>
          </a>
        @endforeach
      </div>
  </div><!-- end blog-list -->
</div>
<!-- end widget -->

<div class="widget">
  <div class="banner-spot clearfix">
      <div class="banner-img">
          <img src="{{asset('/template/client/images/wc2.jpg')}}" alt="" class="img-fluid">
      </div><!-- end banner-img -->
  </div><!-- end banner -->
</div>