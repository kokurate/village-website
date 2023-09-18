@extends('front.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('latest-post') @include('front.layouts.inc.header-latest-post') @endsection
@push('css') 
    @livewireStyles
               <!-- Toastr Cdn-->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
       <!-- Sweet Alert 2 -->
       <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

@endpush
@push('js') 
    @livewireScripts 
    
       <!-- Jquery-->
       <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
 
       <!-- Toastr  cdn -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       
       <!-- Sweet alert 2-->
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
 
    
@endpush
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