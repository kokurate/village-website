@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Tambah Post Baru')
@section('css') @livewireStyles
@section('js') @livewireScripts
@section('pageHeader')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    <ol class="breadcrumb" aria-label="breadcrumbs">
                        <li class="breadcrumb-item"><a href="{{ route('author.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Tambah Post</a></li>
                    </ol>
                </div>
                <h2 class="page-title">
                    Tambahkan Postingan Baru
                </h2>
            </div>
        </div>
    </div>
</div>

@endsection
@section('content')

@livewire('author-add-post')

@endsection