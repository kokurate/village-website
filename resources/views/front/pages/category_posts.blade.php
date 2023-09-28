@extends('front.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Kategori')
@section('latest-post') @include('front.layouts.inc.header-latest-post') @endsection
@section('side-bar') @include('front.layouts.inc.side-bar') @endsection
@section('css')
@section('js')
@section('content')

<section class="whats-news-area pt-50 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-3 col-md-3">
                        <div class="section-tittle mb-30">
                            <h3>{{ $category->subcategory_name }}</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Nav Card -->
                        <div class="tab-content" id="nav-tabContent">
                            <!-- card one -->
                            {{-- <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">            --}}
                                <div class="whats-news-caption">
                                    <div class="row">
                                        @forelse($posts as $post)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="{{ $post->featured_image }}" alt="" style="width: 100%;height:350px;object-fit: cover;">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">{{ $post->subcategory->subcategory_name }}</span>
                                                    <span class="text-muted">{{ date_formatter($post->created_at) }} | {{ $post->author->name }}  |  <i class="fa fa-eye"></i> {{ $post->views }} kali</span>
                                                    <h4><a href="{{ route('read_post', $post->post_slug) }}">{{ substr($post->post_title, 0, 50) }}...</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                            <span class="text-danger">Tidak ada data yang ditemukan</span>
                                        @endforelse
                                        
                                    </div>
                                </div>
                            {{-- </div> --}}
                            
                        </div>
                    <!-- End Nav Card -->
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</section>

{{ $posts->appends(Request()->input())->links('front.layouts.inc.custom_pagination') }}

@endsection