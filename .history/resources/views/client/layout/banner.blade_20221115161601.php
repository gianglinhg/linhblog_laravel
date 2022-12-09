@php
    $query = DB::table('tin')
    ->select('id','tieuDe')
    ->where('noiBat','=', 1)
    ->limit(3);
    $noibat = $query->get();
@endphp

@for($i =0;$i<3;$i++)
<div class="first-slot">
  <div class="masonry-box post-media">
       <img src="/template/client/upload/tech_01.jpg" alt="" class="img-fluid">
       <div class="shadoweffect">
          <div class="shadow-desc">
              <div class="blog-meta">
                  <span class="bg-orange"><a href="tech-category-01.html" title="">Technology</a></span>
                  <h4><a href="tech-single.html" title="">{{$noibat[0]->tieuDe}}</a></h4>
                  <small><a href="tech-single.html" title="">{{$noibat[0]->ngayDang}}</a></small>
                  <small><a href="tech-author.html" title="">{{$noibat[0]->tieuDe}}</a></small>
              </div><!-- end meta -->
          </div><!-- end shadow-desc -->
      </div><!-- end shadow -->
  </div><!-- end post-media -->
</div><!-- end first-side -->

<div class="second-slot">
  <div class="masonry-box post-media">
       <img src="/template/client/upload/tech_02.jpg" alt="" class="img-fluid">
       <div class="shadoweffect">
          <div class="shadow-desc">
              <div class="blog-meta">
                  <span class="bg-orange"><a href="tech-category-01.html" title="">Gadgets</a></span>
                  <h4><a href="tech-single.html" title="">Do not make mistakes when choosing web hosting</a></h4>
                  <small><a href="tech-single.html" title="">03 July, 2017</a></small>
                  <small><a href="tech-author.html" title="">by Jessica</a></small>
              </div><!-- end meta -->
          </div><!-- end shadow-desc -->
       </div><!-- end shadow -->
  </div><!-- end post-media -->
</div><!-- end second-side -->

<div class="last-slot">
  <div class="masonry-box post-media">
       <img src="/template/client/upload/tech_03.jpg" alt="" class="img-fluid">
       <div class="shadoweffect">
          <div class="shadow-desc">
              <div class="blog-meta">
                  <span class="bg-orange"><a href="tech-category-01.html" title="">Technology</a></span>
                  <h4><a href="tech-single.html" title="">The most reliable Galaxy Note 8 images leaked</a></h4>
                  <small><a href="tech-single.html" title="">01 July, 2017</a></small>
                  <small><a href="tech-author.html" title="">by Jessica</a></small>
              </div><!-- end meta -->
          </div><!-- end shadow-desc -->
       </div><!-- end shadow -->
  </div><!-- end post-media -->
</div>
@endfor