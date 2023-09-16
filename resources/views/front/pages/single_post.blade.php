@extends('front.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
{{-- @section('latest-post') @include('front.layouts.inc.header-latest-post') @endsection --}}
@section('css')
@section('js')
@section('content')

<div class="posts-list">
    <div class="single-post">
        <div class="feature-img">
        <img class="img-fluid" src="/storage/images/post_images/{{ $post->featured_image }}" alt="" style="width: 100%">
        </div>
        <div class="blog_details">
        <h2>{{ $post->post_title }}</h2>
        <ul class="blog-info-link mt-3 mb-4">
            <li><a href="#"><i class="fa fa-user"></i> {{ $post->author->name }}</a></li>
            <li><a href="{{ route('category_posts', $post->subcategory->slug) }}"><i class="fa fa-list"></i> {{ $post->subcategory->subcategory_name }}</a></li>
            <li><a href="#"><i class="fa fa-calendar"></i> {{ date_formatter($post->created_at) }}</a></li>
        </ul>
        {!! $post->post_content !!}
        </div>
    </div>
</div>

@endsection