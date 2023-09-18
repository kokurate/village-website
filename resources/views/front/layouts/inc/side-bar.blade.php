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