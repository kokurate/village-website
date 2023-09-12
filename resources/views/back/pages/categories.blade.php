@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Menu & Kategori')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Menu & Kategori</a></li>
                    </ol>
                </div>
                <h2 class="page-title">
                    Menu & Kategori
                </h2>
            </div>
        </div>
    </div>
</div>

@endsection
@section('content')

@livewire('categories')


@endsection

@push('js')
    <script>

        window.addEventListener('hideCategoriesModal', function(e){
            $('#categories_modal').modal('hide');
        });
        
    </script>
@endpush