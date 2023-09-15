@extends('front.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('latest-post') @include('front.layouts.inc.latest-post') @endsection
@section('css')
@section('js')
@section('content')

<h1>Page Content Here</h1>

@endsection