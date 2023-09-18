<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('pageTitle')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

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
    <link rel="stylesheet" href="/front/mycss.css">


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
                            @yield('one-page')
                        <div class="col-lg-8">
                            @yield('latest-post')
                            {{--
                            <hr> --}}
                            @yield('content')
                        </div>
                        <!-- Riht content -->
                            @yield('side-bar')
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->




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



    <script>

        $(document).ready(function(){
            toastr.options= {
              'progressBar' : true,
              'positionClass' : 'toast-top-right'
            }
        });

        window.addEventListener('info', event =>{
          toastr.info(event.detail.message);
        });
        window.addEventListener('success', event =>{
          toastr.success(event.detail.message);
        });
        window.addEventListener('warning', event =>{
          toastr.warning(event.detail.message);
        });
        window.addEventListener('error', event =>{
          toastr.error(event.detail.message);
        });


         document.addEventListener('2sreload', function () {
            setTimeout(function () {
                // Reload the current page
                var currentURL = window.location.href;
                window.location.href = '/';
            }, 2000);
        });

    </script>
    @stack('js')

</body>

</html>