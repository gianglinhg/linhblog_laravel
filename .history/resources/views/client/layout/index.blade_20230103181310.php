<!DOCTYPE html>
<html lang="en">
  <head>
    @include('client.layout.head')
    @livewireStyles
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
                        @yield('paginate')
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div><!-- end col -->

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                  <!-- start sidebar -->
                    <div class="sidebar mt-4">
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