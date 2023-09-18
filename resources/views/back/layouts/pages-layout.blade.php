<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('pageTitle')</title>
    <!-- CSS files -->
    <link href="/back/dist/css/tabler.min.css?1684106062" rel="stylesheet"/>
    <link href="/back/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet"/>
    <link href="/back/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet"/>
    <link href="/back/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet"/>
    <link href="/back/dist/css/demo.min.css?1684106062" rel="stylesheet"/>
    <!-- IjaboCropTool -->
    <link rel="stylesheet" href="{{ asset('back/dist/libs/ijaboCropTool/ijaboCropTool.min.css') }}">
      <!-- Font Awesome 4.7 -->
      <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
      
     <!-- Toastr Cdn-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
       <!-- Sweet Alert 2 -->
       <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

     @yield('css')
     @stack('css')
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body >
    <script src="/back/dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page">
      @include('back.layouts.inc.header')
      <div class="page-wrapper">
        <!-- Page header -->
        @yield('pageHeader')
        
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            @yield('content')
          </div>
        </div>
      @include('back.layouts.inc.footer')
      </div>
    </div>
   
    <!-- Libs JS -->
    <script src="/back/dist/libs/apexcharts/dist/apexcharts.min.js?1684106062" defer></script>
    <script src="/back/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062" defer></script>
    <script src="/back/dist/libs/jsvectormap/dist/maps/world.js?1684106062" defer></script>
    <script src="/back/dist/libs/jsvectormap/dist/maps/world-merc.js?1684106062" defer></script>
    <!-- Tabler Core -->
    <script src="/back/dist/js/tabler.min.js?1684106062" defer></script>
    <script src="/back/dist/js/demo.min.js?1684106062" defer></script>

      <!-- Jquery-->
      <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

      <!-- ijaboCropTool-->
      <script src="{{ asset('back/dist/libs/ijaboCropTool/ijaboCropTool.min.js') }}"></script>

      <!-- Toastr  cdn -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
      <!-- Sweet alert 2-->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

      <!-- Toastr script for livewire-->
      <script>
        $(document).ready(function(){
            toastr.options= {
              'progressBar' : true,
              'positionClass' : 'toast-top-right'
            }
        });
        window.addEventListener('info', event =>{
          toastr.info(event.detail.message);
        });
        window.addEventListener('success', event =>{
          toastr.success(event.detail.message);
        });
        window.addEventListener('warning', event =>{
          toastr.warning(event.detail.message);
        });
        window.addEventListener('error', event =>{
          toastr.error(event.detail.message);
        });

        document.addEventListener('2sreload', function () {
            setTimeout(function () {
                // Reload the current page
                var currentURL = window.location.href;
                window.location.href = currentURL;
            }, 2000);
        });

      </script>

    @yield('js')
    @stack('js')
  </body>
</html>