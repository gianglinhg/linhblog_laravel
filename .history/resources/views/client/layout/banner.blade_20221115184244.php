
<div class="first-slot">
  <div class="masonry-box post-media">
       <img src="/template/{{$noibat[0]->urlHinh}}" alt="" class="img-fluid">
       <div class="shadoweffect">
          <div class="shadow-desc">
              <div class="blog-meta">
                  <span class="bg-orange"><a href="#" title="">{{$name}}</a></span>
                  <h4><a href="{{ url('/tin',[$tin->id]); }}" title="">{{$noibat[0]->tieuDe}}</a></h4>
                  <small><a href="#" title="">{{date("d-m-Y", strtotime($noibat[0]->ngayDang))}}</a></small>
                  <small><a href="tech-author.html" title="">Tin nổi bật</a></small>
              </div><!-- end meta -->
          </div><!-- end shadow-desc -->
      </div><!-- end shadow -->
  </div><!-- end post-media -->
</div><!-- end first-side -->

<div class="second-slot">
  <div class="masonry-box post-media">
       <img src="/template/{{$noibat[1]->urlHinh}}" alt="" class="img-fluid">
       <div class="shadoweffect">
          <div class="shadow-desc">
              <div class="blog-meta">
                  <span class="bg-orange"><a href="#" title="">{{$name}}</a></span>
                  <h4><a href="#" title="">{{$noibat[1]->tieuDe}}</a></h4>
                  <small><a href="#" title="">{{date("d-m-Y", strtotime($noibat[1]->ngayDang))}}</a></small>
                  <small><a href="tech-author.html" title="">Tin nổi bật</a></small>
              </div><!-- end meta -->
          </div><!-- end shadow-desc -->
       </div><!-- end shadow -->
  </div><!-- end post-media -->
</div><!-- end second-side -->

<div class="last-slot">
  <div class="masonry-box post-media">
       <img src="/template/{{$noibat[2]->urlHinh}}" alt="" class="img-fluid">
       <div class="shadoweffect">
          <div class="shadow-desc">
              <div class="blog-meta">
                  <span class="bg-orange"><a href="#" title="">{{$name}}</a></span>
                  <h4><a href="#" title="">{{$noibat[2]->tieuDe}}</a></h4>
                  <small><a href="#" title="">{{date("d-m-Y", strtotime($noibat[2]->ngayDang))}}</a></small>
                  <small><a href="tech-author.html" title="">Tin nổi bật</a></small>
              </div><!-- end meta -->
          </div><!-- end shadow-desc -->
       </div><!-- end shadow -->
  </div><!-- end post-media -->
</div>
