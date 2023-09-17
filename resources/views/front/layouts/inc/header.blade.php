<header>
    <!-- Header Start -->
   <div class="header-area">
        <div class="main-header ">
            <div class="header-top black-bg d-none d-md-block">
               <div class="container">
                   <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>     
                                    <li><img src="/front/assets/img/icon/header_icon1.png" alt="">34ºc, Sunny </li>
                                    <li><img src="/front/assets/img/icon/header_icon1.png" alt="">Tuesday, 18th June, 2019</li>
                                </ul>
                            </div>
                            {{-- <div class="header-info-right">
                                <ul class="header-social">    
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                   <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div> --}}
                        </div>
                   </div>
               </div>
            </div>
            <div class="header-mid d-none d-md-block">
               <div class="container">
                <div class="row d-flex align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-3 col-lg-3 col-md-3">
                        <div class="logo">
                            <a href="/"><img src="/front/assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-6">
                        <div class="trending-animated">
                            <ul id="js-news" class="js-hidden">
                                <li class="news-item">WEBSITE RESMI DESA TORUAKAT</li>
                                <li class="news-item">KECAMATAN DUMOGA</li>
                                <li class="news-item">KABUPATEN BOLAANG MONGONDOW</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="header-right-btn f-right d-none d-lg-block">
                            <i class="fas fa-search special-tag"></i>
                            <div class="search-box">
                                <form action="{{ route('search_posts') }}">
                                    <input id="search-query" name="query" value="{{ Request('query') }}" type="search" placeholder="Masukkan Keywords">
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
            </div>
           <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 header-flex">
                            <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="/"><img src="/front/assets/img/logo/logo.png" alt=""></a>
                                </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block my-main-menu">
                                <nav>                  
                                    <ul id="navigation">    
                                        <li><a href="/">Home</a></li>
                                        @foreach(\App\Models\Category::whereHas('subcategories', function($q){
                                            $q->whereHas('posts');
                                          })->get() as $category)
                                        <li><a href="#">{{ $category->category_name }}</a>
                                            <ul class="submenu">
                                                @foreach(\App\Models\SubCategory::where('parent_category', $category->id)->whereHas('posts')->get() as $subcategory)
                                                    <li><a href="{{ route('category_posts', $subcategory->slug) }}">{{ $subcategory->subcategory_name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                        <li><a href="#">Data Desa</a>
                                            <ul class="submenu">
                                                    <li><a href="{{ route('statistik1') }}">Wilayah Administratif</a></li>
                                                    <li><a href="{{ route('statistik2') }}">Tingkat Pendidikan</a></li>
                                                    <li><a href="{{ route('statistik3') }}">Mata Pencaharian</a></li>
                                                    <li><a href="{{ route('statistik4') }}">Jenis Kelamin</a></li>
                                                    <li><a href="{{ route('statistik5') }}">Golongan Umur</a></li>
                                                    <li><a href="{{ route('statistik6') }}">Agama</a></li>
                                            </ul>
                                        </li>
                                        @foreach(\App\Models\SubCategory::where('parent_category', 0)->whereHas('posts')->get() as $subcategory)
                                            <li><a href="{{ route('category_posts', $subcategory->slug) }}">{{ $subcategory->subcategory_name }}</a></li>
                                        @endforeach
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>             
                        {{-- <div class="col-xl-2 col-lg-2 col-md-4">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <i class="fas fa-search special-tag"></i>
                                <div class="search-box">
                                    <form action="#">
                                        <input type="text" placeholder="Search">
                                        
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
   </div>
    <!-- Header End -->
</header>