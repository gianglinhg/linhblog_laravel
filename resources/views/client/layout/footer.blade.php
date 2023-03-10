@php
    $menu = DB::table('loaitin')
        ->select('id', 'ten')
        ->orderBy('thuTu')
        ->where('anHien', '=', 1)
        ->limit(5);
    $loaitin_arr = $menu->get();
@endphp
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="widget">
                    <div class="footer-text text-left">
                        <a href="index.html"><img src="images/version/tech-footer-logo.png" alt=""
                                class="img-fluid"></a>
                        <p>Giang Văn Linh</p>
                        <div class="social">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
                                    class="fa fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i
                                    class="fa fa-instagram"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i
                                    class="fa fa-google-plus"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i
                                    class="fa fa-pinterest"></i></a>
                        </div>

                        <hr class="invis">

                        <div class="newsletter-widget text-left">
                            <form class="form-inline">
                                <input type="text" class="form-control" placeholder="Nhập địa chỉ email của bạn">
                                <button type="submit" class="btn btn-primary">Gửi</button>
                            </form>
                        </div><!-- end newsletter -->
                    </div><!-- end footer-text -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Danh mục</h2>
                    @foreach ($loaitin_arr as $loaitin)
                        <div class="link-widget">
                            <ul>
                                <li><a href="{{ url('/loai', [$loaitin->id]) }}">{{ $loaitin->ten }}</a></li>
                            </ul>
                        </div><!-- end link-widget -->
                    @endforeach
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Liên hệ</h2>
                    <div class="link-widget">
                        <ul>
                            <li><a href="#"><b>Sđt: </b>0337229661</a></li>
                            <li><a href="#"><b>Email: </b>linhbq89@gmail.com</a></li>
                        </ul>
                    </div><!-- end link-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <br>
                <div class="copyright">&copy; Linh Blog. Thiết kế: <a href="http:facebook.com/giangvanlinh2001">Giang
                        Văn Linh</a>.</div>
            </div>
        </div>
    </div><!-- end container -->
</footer><!-- end footer -->

<div class="dmtop">Scroll to Top</div>

</div><!-- end wrapper -->

<!-- Core JavaScript
================================================== -->
<script src="/template/client/js/jquery.min.js"></script>
<script src="/template/client/js/tether.min.js"></script>
<script src="/template/client/js/bootstrap.min.js"></script>
<script src="/template/client/js/custom.js"></script>
@stack('footer');
