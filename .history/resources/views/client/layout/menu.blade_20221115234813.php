@php
  $menu = DB::table('loaitin')
    // ->join('tin','loaitin.id','=', 'tin.idLT')
        ->select('.id', 'ten')
        ->orderBy('thuTu')
        ->where('anHien', '=', 1)
        ->limit(5);
        $loaitin = $menu ->get();
    // $tin = DB::table('loaitin')
    //     // ->select('id', 'ten')
    //     ->orderBy('thuTu')
    //     ->where('anHien', '=', 1)
    //     ->limit(5);
@endphp
<div class="container-fluid">
  <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="/"><img src="images/version/tech-logo.png" alt=""></a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                  <a class="nav-link" href="/">Trang chủ</a>
              </li>
              <li class="nav-item dropdown has-submenu menu-large hidden-md-down hidden-sm-down hidden-xs-down">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tin tức</a>
                  <ul class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                      <li>
                          <div class="container">
                              <div class="mega-menu-content clearfix">
                                {{-- @foreach ($loaitin as tin)
                                    <div class="tab">
                                        <button class="tablinks"><a href="{{url('/loai',[$tin->id])}}">{{$tin->ten}}</a></button>
                                    </div>
                                    @endforeach --}}
                                {{-- @foreach ($loaitin as $tin) --}}
                                  <div class="tab">
                                      <button class="tablinks active" onclick="openCategory(event, 'cat01')">
                                        <a href="{{url('/loai',[$loaitin[0]->id])}}">
                                            {{$loaitin[0]->ten}}
                                        </a>
                                    </button>
                                      <button class="tablinks active" onclick="openCategory(event, 'cat01')">
                                        <a href="{{url('/loai',[$loaitin[1]->id])}}">
                                            {{$loaitin[1]->ten}}
                                        </a>
                                    </button>
                                      <button class="tablinks active" onclick="openCategory(event, 'cat01')">
                                        <a href="{{url('/loai',[$loaitin[2]->id])}}">
                                            {{$loaitin[2]->ten}}
                                        </a>
                                    </button>
                                      <button class="tablinks active" onclick="openCategory(event, 'cat01')">
                                        <a href="{{url('/loai',[$loaitin[3]->id])}}">
                                            {{$loaitin[3]->ten}}
                                        </a>
                                    </button>
                                      <button class="tablinks active" onclick="openCategory(event, 'cat01')">
                                        <a href="{{url('/loai',[$loaitin[4]->id])}}">
                                            {{$loaitin[4]->ten}}
                                        </a>
                                    </button>
                                      <button class="tablinks active" onclick="openCategory(event, 'cat01')">
                                        <a href="{{url('/loai',[$loaitin[0]->id])}}">
                                            {{$loaitin[0]->ten}}
                                        </a>
                                    </button>

                                    </div>
                                {{-- @endforeach --}}
                                  <div class="tab-details clearfix">
                                      <div id="cat01" class="tabcontent active">
                                        {{-- @foreach($loaitin as $item) --}}
                                          <div class="row">
                                              <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                  <div class="blog-box">
                                                      <div class="post-media">
                                                          <a href="tech-single.html" title="">
                                                              <img src="upload/tech_menu_01.jpg" alt="" class="img-fluid">
                                                              <div class="hovereffect">
                                                              </div><!-- end hover -->
                                                              <span class="menucat">Science</span>
                                                          </a>
                                                      </div><!-- end media -->
                                                      <div class="blog-meta">
                                                          <h4><a href="tech-single.html" title="">Top 10+ care advice for your toenails</a></h4>
                                                      </div><!-- end meta -->
                                                  </div><!-- end blog-box -->
                                              </div>
                                          </div><!-- end row -->
                                          {{-- @endforeach --}}
                                      </div>
                                      <div id="cat02" class="tabcontent">
                                          <div class="row">
                                              <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                  <div class="blog-box">
                                                      <div class="post-media">
                                                          <a href="tech-single.html" title="">
                                                              <img src="upload/tech_menu_05.jpg" alt="" class="img-fluid">
                                                              <div class="hovereffect">
                                                              </div><!-- end hover -->
                                                              <span class="menucat">Technology</span>
                                                          </a>
                                                      </div><!-- end media -->
                                                      <div class="blog-meta">
                                                          <h4><a href="tech-single.html" title="">2017 summer stamp will have design models here</a></h4>
                                                      </div><!-- end meta -->
                                                  </div><!-- end blog-box -->
                                              </div>

                                          </div><!-- end row -->
                                      </div>
                                      <div id="cat03" class="tabcontent">
                                          <div class="row">
                                              <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                  <div class="blog-box">
                                                      <div class="post-media">
                                                          <a href="tech-single.html" title="">
                                                              <img src="upload/tech_menu_09.jpg" alt="" class="img-fluid">
                                                              <div class="hovereffect">
                                                              </div><!-- end hover -->
                                                              <span class="menucat">Social Media</span>
                                                          </a>
                                                      </div><!-- end media -->
                                                      <div class="blog-meta">
                                                          <h4><a href="tech-single.html" title="">I visited the architects of Istanbul for you</a></h4>
                                                      </div><!-- end meta -->
                                                  </div><!-- end blog-box -->
                                              </div>

                                          </div><!-- end row -->
                                      </div>
                                      <div id="cat04" class="tabcontent">
                                          <div class="row">
                                              <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                  <div class="blog-box">
                                                      <div class="post-media">
                                                          <a href="tech-single.html" title="">
                                                              <img src="upload/tech_menu_13.jpg" alt="" class="img-fluid">
                                                              <div class="hovereffect">
                                                              </div><!-- end hover -->
                                                              <span class="menucat">Car News</span>
                                                          </a>
                                                      </div><!-- end media -->
                                                      <div class="blog-meta">
                                                          <h4><a href="tech-single.html" title="">A collection of the most beautiful shop designs</a></h4>
                                                      </div><!-- end meta -->
                                                  </div><!-- end blog-box -->
                                              </div>

                                          </div><!-- end row -->
                                      </div>
                                      <div id="cat05" class="tabcontent">
                                          <div class="row">
                                              <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                  <div class="blog-box">
                                                      <div class="post-media">
                                                          <a href="tech-single.html" title="">
                                                              <img src="upload/tech_menu_17.jpg" alt="" class="img-fluid">
                                                              <div class="hovereffect">
                                                              </div><!-- end hover -->
                                                              <span class="menucat">Worldwide</span>
                                                          </a>
                                                      </div><!-- end media -->
                                                      <div class="blog-meta">
                                                          <h4><a href="tech-single.html" title="">Grilled vegetable with fish prepared with fish</a></h4>
                                                      </div><!-- end meta -->
                                                  </div><!-- end blog-box -->
                                              </div>

                                          </div><!-- end row -->
                                      </div>
                                  </div>

                                  <!-- end tab-details -->
                              </div><!-- end mega-menu-content -->
                          </div>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="tech-contact.html">Giới thiệu</a>
              </li>
          </ul>
          <ul class="navbar-nav mr-2">
              <li class="nav-item">
                  <a class="nav-link" href="../admin"><i class="fa fa-android"></i></a>
              </li>
              {{-- <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fa fa-android"></i></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fa fa-apple"></i></a>
              </li> --}}
          </ul>
      </div>
  </nav>
</div>