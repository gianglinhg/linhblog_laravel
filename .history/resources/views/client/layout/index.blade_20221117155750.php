<!DOCTYPE html>
<html lang="en">
  <head>
    @include('client.layout.head')
  </head>
<body>
<div id="wrapper">
    <header class="tech-header header">
        @include('client.layout.menu')
        <!-- end container-fluid -->
    </header>
    <!-- end market-header -->
    <section class="section first-section">
        <div class="container-fluid">
            <div class="masonry-blog clearfix">
              <!-- start masonry -->
                {{-- @include('client.layout.banner') --}}
                @yield('banner')
              <!-- end masonry -->
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    @yield('content')
                    <!-- end page-wrapper -->
                    <hr class="invis">
                    <div class="row">
                        {{-- <div class="col-md-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div> --}}
                        {{-- {!! $panigate->links() !!} --}}
                        {{ $paginator->links('view.name') }}
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div><!-- end col -->

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                  <!-- start sidebar -->
                    <div class="sidebar">
                        @include('client.layout.sidebar')
                    </div>
                    <!-- end sidebar -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    {{-- Start Footer --}}
    @include('client.layout.footer')
    {{-- End footer --}}
</body>
</html>