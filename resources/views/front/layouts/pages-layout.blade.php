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
                        <div class="col-lg-8">
                            @yield('latest-post')
                            {{--
                            <hr> --}}
                            @yield('content')
                        </div>
                        <!-- Riht content -->
                        <div class="col-lg-4">
                            <!-- Aparatur desa start-->
                            <div class="mb-2 col-12 text-center">
                                <h3>Aparatur Desa</h3>
                                <div id="portraitCarousel" class="carousel slide mb-5" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        @foreach(\App\Models\Aparatur::all() as $index => $data)
                                            <li data-target="#portraitCarousel" data-slide-to="{{ $index }}" @if($index === 0) class="active" @endif></li>
                                        @endforeach
                                    </ol>
                                
                                    <!-- Slides -->
                                    <div class="carousel-inner">
                                        @forelse(\App\Models\Aparatur::all() as $index => $data)
                                            <div class="carousel-item @if($index === 0) active @endif">
                                                {{-- <img class="d-block w-100" src="{{ $data->image }}" alt="{{ $data->nama }}"> --}}
                                                <img src="{{ $data->image }}" alt="" style="width:100%;height:100%;border-radius:10%;border:2px solid;">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5 class="" style="background-color:white; "><u><strong>{{ $data->nama }}</strong></u></h5>
                                                    <p class="" style="background-color:white; "><strong>{{ $data->jabatan }}</strong></p>
                                                </div>
                                            </div>
                                        @empty
                                            <span class="text-danger">Tidak Ada Data</span>
                                        @endforelse
                                    </div>
                                
                                    <!-- Controls -->
                                    <a class="carousel-control-prev" href="#portraitCarousel" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#portraitCarousel" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <!-- Aparatur desa end-->

                            <div class="blog_right_sidebar">

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



                                <aside class="single_sidebar_widget popular_post_widget">
                                    <nav>
                                        <h3 class="">Archive</h3>
                                        <div class="nav nav-tabs my-2" id="nav-tab" role="tablist">
                                            <button class="nav-link genric-btn danger-border small active"
                                                id="nav-acak-tab" data-toggle="tab" data-target="#nav-acak"
                                                type="button" role="tab" aria-controls="nav-acak"
                                                aria-selected="true">Acak</button>
                                            <button class="nav-link genric-btn danger-border small" id="nav-terbaru-tab"
                                                data-toggle="tab" data-target="#nav-terbaru" type="button" role="tab"
                                                aria-controls="nav-terbaru" aria-selected="false">Terbaru</button>
                                            {{-- <button class="nav-link genric-btn danger-border small"
                                                id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact"
                                                type="button" role="tab" aria-controls="nav-contact"
                                                aria-selected="false" style="border: none;">Contact</button> --}}
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-acak" role="tabpanel"
                                            aria-labelledby="nav-acak-tab">
                                            @if(recommended_posts())
                                            @foreach(recommended_posts() as $item)
                                            <div class="media post_item">
                                                <img src="/storage/images/post_images/{{ $item->featured_image }}"
                                                    alt="post" style="width: 100px;height:75px;object-fit: cover;">
                                                <div class="media-body">
                                                    <a href="{{ route('read_post', $item->post_slug) }}">
                                                        <h3>{{ substr($item->post_title , 0 , 40) }}...</h3>
                                                    </a>
                                                    <p>{{ date_formatter($item->created_at) }}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="tab-pane fade" id="nav-terbaru" role="tabpanel"
                                            aria-labelledby="nav-terbaru-tab">
                                            @if(latest_sidebar_posts())
                                            @foreach(latest_sidebar_posts() as $item)
                                            <div class="media post_item">
                                                <img src="/storage/images/post_images/{{ $item->featured_image }}"
                                                    alt="post" style="width: 100px;height:75px;object-fit: cover;">
                                                <div class="media-body">
                                                    <a href="{{ route('read_post', $item->post_slug) }}">
                                                        <h3>{{ substr($item->post_title , 0 , 40) }}...</h3>
                                                    </a>
                                                    <p>{{ date_formatter($item->created_at) }}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                            aria-labelledby="nav-contact-tab">test 3</div>
                                    </div>


                                </aside>

                                @if(categories())
                                <aside class="single_sidebar_widget post_category_widget">
                                    <h4 class="widget_title">Category</h4>
                                    <ul class="list cat-list">
                                        @foreach(categories() as $item)
                                        <li>
                                            <a href="{{ route('category_posts', $item->slug) }}"
                                                class="d-flex custom-category">
                                                <p class="mx-1">{{ $item->subcategory_name }}</p>
                                                <p class="mx-1">({{ $item->posts->count() }})</p>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </aside>
                                @endif

                            </div>
                        </div>
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

    @stack('js')

</body>

</html>