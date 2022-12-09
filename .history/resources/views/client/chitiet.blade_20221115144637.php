@extends('client.layout.main')
@section('content')
<div class="page-wrapper">
  <div class="blog-title-area text-center">
      <ol class="breadcrumb hidden-xs-down">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Blog</a></li>
          <li class="breadcrumb-item active">{{$tin->id}}</li>
      </ol>

      <span class="color-orange"><a href="tech-category-01.html" title="">Technology</a></span>

      <h3>{{$tin}}</h3>

      <div class="blog-meta big-meta">
          <small><a href="tech-single.html" title="">21 July, 2017</a></small>
          <small><a href="tech-author.html" title="">by Jessica</a></small>
          <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>
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
      <div class="pp">
          <p>In lobortis pharetra mattis. Morbi nec nibh iaculis, <a href="#">bibendum augue a</a>, ultrices nulla. Nunc velit ante, lacinia id tincidunt eget, faucibus nec nisl. In mauris purus, bibendum et gravida dignissim, venenatis commodo lacus. Duis consectetur quis nisi nec accumsan. Pellentesque enim velit, ut tempor turpis. Mauris felis neque, egestas in lobortis et,iaculis at nunc ac, rhoncus sagittis ipsum. </p>

          <h3><strong>Maecenas non convallis quam, eu sodales justo. Pellentesque quis lectus elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong></h3>

          <p>Donec nec metus sed leo sollicitudin ornare sed consequat neque. Aliquam iaculis neque quis dui venenatis, eget posuere felis viverra. Ut sit amet feugiat elit, nec elementum velit. Sed eu nisl convallis, efficitur turpis eu, euismod nunc. Proin neque enim, malesuada non lobortis nec, facilisis et lectus. Ie consectetur. Nam eget neque ac ex fringilla dignissim eu ac est. Nunc et nisl vel odio posuere. </p>

          <p>Vivamus non condimentum orci. Pellentesque venenatis nibh sit amet est vehicula lobortis. Cras eget aliquet eros. Nunc lectus elit, suscipit at nunc sed, finibus imperdiet ipsum. Maecenas dapibus neque sodales nulla finibus volutpat. Integer pulvinar massa vitae ultrices posuere. Proin ut tempor turpis. Mauris felis neque, egestas in lobortis et, sodales non ante. Ut vestibulum libero quis luctus tempus. Nullam eget dignissim massa. Vivamus id condimentum orci. Nunc ac sem urna. Aliquam et hendrerit nisl massa nunc. </p>

      </div><!-- end pp -->

      <img src="upload/tech_menu_09.jpg" alt="" class="img-fluid img-fullwidth">

      <div class="pp">
          <h3><strong>Nam non velit est. Sed lobortis arcu vitae nunc molestie consectetur. Nam eget neque ac ex fringilla dignissim eu ac est. Nunc et nisl vel odio posuere. </strong></h3>

          <p>Vivamus non condimentum orci. Pellentesque venenatis nibh sit amet est vehicula lobortis. Cras eget aliquet eros. Nunc lectus elit, suscipit at nunc sed, finibus imperdiet ipsum. Maecenas dapibus neque sodales nulla finibus volutpat. Integer pulvinar massa vitae ultrices posuere. Proin ut tempor turpis. Mauris felis neque, egestas in lobortis et, sodales non ante. Ut vestibulum libero quis luctus tempus. Nullam eget dignissim massa. Vivamus id condimentum orci. Nunc ac sem urna. Aliquam et hendrerit nisl massa nunc. </p>

          <p>Morbi pharetra porta consequat. Aenean et diam sapien. <a href="#">Interdum et malesuada</a> fames ac ante ipsum primis in faucibus. Pellentesque dictum ligula iaculis, feugiat metus eu, sollicitudin ex. Quisque eu ullamcorper ligula. In vel ex ac purus finibus viverra. Maecenas pretium lobortis turpis. Fusce lacinia nisi in tortor massa nunc.</p>

          <ul class="check">
              <li>Integer sit amet odio ac lectus imperdiet elementum.</li>
              <li>Praesent vitae lacus sed lacus ullamcorper mollis.</li>
              <li>Donec vitae metus ac felis vulputate tincidunt non et ex.</li>
              <li>In dapibus sapien at viverra venenatis.</li>
              <li>Pellentesque mollis velit id maximus finibus.</li>
          </ul>

          <p>Proin ultricies nulla consectetur, sollicitudin dolor at, sollicitudin mauris. Maecenas at nunc nunc. Ut nulla felis, tincidunt et porttitor at, rutrum in dolor. Aenean id tincidunt ligula. Donec vitae placerat odio. Mauris accumsan nibh ut nunc maximus, ac auctor elit vehicula. Cras leo sem, vehicula a ultricies ac, condimentum vitae lectus. Sed ut eros euismod, luctus nisl eu, congue odio. </p>

          <p><img src="upload/tech_menu_10.jpg" class="float-left" width="380" alt="">Suspendisse ultrices placerat dolor sed efficitur. Morbi in laoreet diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris ut massa id lectus laoreet porta non in metus. Donec nibh justo, tincidunt non justo ut, tincidunt malesuada turpis. Cras pellentesque sollicitudin ex eget pharetra.rta non in metus. Donec nibh justo, tincidunt non justo ut, tincidunt malesuada turpis. Cras pellentesque sollicitudin ex eget pharetra.</p>

          <h3><strong>Nam non velit est. Sed lobortis arcu vitae nunc molestie consectetur. Nam eget neque ac ex fringilla dignissim eu ac est. Nunc et nisl vel odio posuere. </strong></h3>


          <p>Aliquam eget maximus odio. Aliquam varius nisl ut leo fermentum, id fringilla magna tempus. Curabitur quis bibendum lorem, ut suscipit tellus. Morbi id dictum justo, et massa nunc. Mauris laoreet, neque et varius malesuada, justo neque consequat dolor, sit amet semper dui ligula commodo enim. Duis mauris magna, euismod in ante sed, laoreet faucibus elit. Nam euismod vulputate lorem, nec tincidunt lacus volutpat sit amet. In libero eros, dignissim vitae quam sed, maximus consectetur justo. Donec id orci eget odio convallis pellentesque. Quisque urna cras amet.Vivamus non condimentum orci. Pellentesque venenatis nibh sit amet est vehicula lobortis. Cras eget aliquet eros. Nunc lectus elit, suscipit at nunc sed, finibus imperdiet ipsum. Maecenas dapibus neque sodales nulla finibus volutpat. Integer pulvinar massa vitae ultrices posuere. Proin ut tempor turpis. Mauris felis neque, egestas in lobortis et, sodales non ante. Ut vestibulum libero quis luctus tempus. Nullam eget dignissim massa. Vivamus id condimentum orci. Nunc ac sem urna. Aliquam et hendrerit nisl massa nunc. </p>

          <p><img src="upload/tech_menu_11.jpg" class="float-right" width="380" alt="">Suspendisse ultrices placerat dolor sed efficitur. Morbi in laoreet diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris ut massa id lectus laoreet porta non in metus. Donec nibh justo, tincidunt non justo ut, tincidunt malesuada turpis. Cras pellentesque sollicitudin ex eget pharetra.rta non in metus. Donec nibh justo, tincidunt non justo ut, tincidunt malesuada turpis. Cras pellentesque sollicitudin ex eget pharetra.</p>

          <p>Vivamus non condimentum orci. Pellentesque venenatis nibh sit amet est vehicula lobortis. Cras eget aliquet eros. Nunc lectus elit, suscipit at nunc sed, finibus imperdiet ipsum. Maecenas dapibus neque sodales nulla finibus volutpat. Integer pulvinar massa vitae ultrices posuere. Proin ut tempor turpis. Mauris felis neque, egestas in lobortis et, sodales non ante. Ut vestibulum libero quis luctus tempus. Nullam eget dignissim massa. Vivamus id condimentum orci. Nunc ac sem urna. Aliquam et hendrerit nisl massa nunc. </p>
      </div><!-- end pp -->
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