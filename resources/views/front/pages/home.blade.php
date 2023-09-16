@extends('front.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('latest-post') @include('front.layouts.inc.header-latest-post') @endsection
@section('content')


<div class="section-tittle mb-30">
    <h3>Post Terbaru</h3>
</div>
<section class="blog_area section-padding pt-0 mt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @if(latest_6_post())
                    @foreach(latest_6_post() as $latest_post)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="/storage/images/post_images/{{ $latest_post->featured_image }}" alt="" style="max-height: 200px;object-fit: cover;">
                            <a href="#" class="blog_item_date">
                                {{ date_formatter($latest_post->created_at) }}
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="single-blog.html">
                                <h2>{{ $latest_post->post_title }}</h2>
                            </a>
                            <p>{!! substr($latest_post->post_content,0,250) !!}...</p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="fa fa-user"></i>{{ $latest_post->author->name }}</a></li>
                                <li><a href="#"><i class="fa fa-list"></i> {{ $latest_post->subcategory->subcategory_name }}</a></li>
                            </ul>
                        </div>
                    </article>
                    @endforeach
                    @endif
                 <!-- Pagination here -->
                    

                </div>
            </div>
        
        </div>
    </div>
</section>

@endsection