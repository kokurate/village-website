@extends('front.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('latest-post') @include('front.layouts.inc.header-latest-post') @endsection
@push('css') @livewireStyles    @endpush
@push('js') @livewireScripts @endpush
@section('one-page')

<div class="col-lg-8 mx-auto mb-150">
   
        <div class="row mb-4">
            <div class="col">
                <img src="/front/assets/img/logo/logo1.png" alt="LOGO" class="mb-3 d-flex mx-auto" style="width:10%;">
                <h3 class="text-center">Pelayanan Surat Online</h3>
                <h4 class="text-center">Desa Toruakat</h4>
            </div>
        </div>
     
        @livewire('visitor-surat-online-form')
          
<br><br><br><br><br><br><br>

</div>

@endsection