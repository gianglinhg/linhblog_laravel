
@extends('client.layout.index')
<div class="page-title lb single-wrapper">
  <div class="container">
      <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
              {{-- <h2><i class="fa fa-star bg-orange"></i>{{$name}}
                  <small class="hidden-xs-down hidden-sm-down"></small>
              </h2> --}}
          </div><!-- end col -->
      </div><!-- end row -->
  </div><!-- end container -->
</div>
@section('content')
@foreach ($searchTin as $tin)
  <div class="page-wrapper">
      <div class="blog-list clearfix">
          <div class="blog-box row">
              <div class="col-md-4">
                  <div class="post-media">
                      <a href="{{ url('/tin',[$tin->id]); }}">
                          <img src="/template/{{$tin->urlHinh}}" alt="Hình" class="img-fluid">
                          <div class="hovereffect"></div>
                      </a>
                  </div><!-- end media -->
              </div><!-- end col -->

              <div class="blog-meta big-meta col-md-8">
                  <h4><a href="{{ url('/tin',[$tin->id]); }}" title="">{{$tin->tieuDe}}</a></h4>
                  <p>{{$tin->tomTat}}</p>
                  <small class="firstsmall"><a class="bg-orange p-1"></a></small>
                  <small>
                      <a href="#">{{date("d-m-Y", strtotime($tin->ngayDang))}}</a>
                  </small>
                  <small>
                      <a href="#"><i class="fa fa-eye"></i> {{$tin->xem}}</a>
                  </small>
              </div><!-- end meta -->
          </div><!-- end blog-box -->

          <hr class="invis">

          <!-- end blog-box -->
      </div><!-- end blog-list -->
  </div>
  @endforeach
@endsection
@section('paginate')
  {{ $searchTin->appends(request()->all()) ->links('paginate') }}
@endsection