<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('pageTitle')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="/front/assets/img/favicon.ico">

		<!-- CSS here -->
        <link rel="stylesheet" href="/front/mycss.css">
            <link rel="stylesheet" href="/front/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="/front/assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="/front/assets/css/ticker-style.css">
            <link rel="stylesheet" href="/front/assets/css/flaticon.css">
            <link rel="stylesheet" href="/front/assets/css/slicknav.css">
            <link rel="stylesheet" href="/front/assets/css/animate.min.css">
            <link rel="stylesheet" href="/front/assets/css/magnific-popup.css">
            <link rel="stylesheet" href="/front/assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="/front/assets/css/themify-icons.css">
            <link rel="stylesheet" href="/front/assets/css/slick.css">
            <link rel="stylesheet" href="/front/assets/css/nice-select.css">
            <link rel="stylesheet" href="/front/assets/css/style.css">      
            @stack('css')
   </head>

   <body>
       
    <!-- Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="/front/assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start -->

   @include('front.layouts.inc.header')

    <main>
    <!-- Trending Area Start -->
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            {{-- <strong>Trending now</strong> --}}
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                          
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        @yield('latest-post')
                        <hr>
                        @yield('content')
                    </div>
                    <!-- Riht content -->
                    <div class="col-lg-4">
                        <div class="trand-right-single d-flex">
                            <div class="trand-right-img">
                                <img src="/front/assets/img/trending/right1.jpg" alt="">
                            </div>
                            <div class="trand-right-cap">
                                <span class="color1">Concert</span>
                                <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                        </div>
                        <div class="trand-right-single d-flex">
                            <div class="trand-right-img">
                                <img src="/front/assets/img/trending/right2.jpg" alt="">
                            </div>
                            <div class="trand-right-cap">
                                <span class="color3">sea beach</span>
                                <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                        </div>
                        <div class="trand-right-single d-flex">
                            <div class="trand-right-img">
                                <img src="/front/assets/img/trending/right3.jpg" alt="">
                            </div>
                            <div class="trand-right-cap">
                                <span class="color2">Bike Show</span>
                                <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                        </div> 
                        <div class="trand-right-single d-flex">
                            <div class="trand-right-img">
                                <img src="/front/assets/img/trending/right4.jpg" alt="">
                            </div>
                            <div class="trand-right-cap">
                                <span class="color4">See beach</span>
                                <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                        </div>
                        <div class="trand-right-single d-flex">
                            <div class="trand-right-img">
                                <img src="/front/assets/img/trending/right5.jpg" alt="">
                            </div>
                            <div class="trand-right-cap">
                                <span class="color1">Skeping</span>
                                <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->



    <!--Start pagination -->
    <div class="pagination-area pb-45 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                              <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow roted"></span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                              <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow right-arrow"></span></a></li>
                            </ul>
                          </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End pagination  -->
    </main>
    
    @include('front.layouts.inc.footer')
   
	<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="/front/assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="/front/assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="/front/assets/js/popper.min.js"></script>
        <script src="/front/assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="/front/assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="/front/assets/js/owl.carousel.min.js"></script>
        <script src="/front/assets/js/slick.min.js"></script>
        <!-- Date Picker -->
        <script src="/front/assets/js/gijgo.min.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="/front/assets/js/wow.min.js"></script>
		<script src="/front/assets/js/animated.headline.js"></script>
        <script src="/front/assets/js/jquery.magnific-popup.js"></script>

        <!-- Breaking New Pluging -->
        <script src="/front/assets/js/jquery.ticker.js"></script>
        <script src="/front/assets/js/site.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="/front/assets/js/jquery.scrollUp.min.js"></script>
        <script src="/front/assets/js/jquery.nice-select.min.js"></script>
		<script src="/front/assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="/front/assets/js/contact.js"></script>
        <script src="/front/assets/js/jquery.form.js"></script>
        <script src="/front/assets/js/jquery.validate.min.js"></script>
        <script src="/front/assets/js/mail-script.js"></script>
        <script src="/front/assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="/front/assets/js/plugins.js"></script>
        <script src="/front/assets/js/main.js"></script>
        
        @stack('js')

    </body>
</html>