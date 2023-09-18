@extends('back.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Login')
@section('css') @livewireStyles
@section('js')  @livewireScripts
@section('content')

<div class="page page-center">
    <div class="container container-normal py-4">
      <div class="row align-items-center g-4">
        <div class="col-lg">
          <div class="container-tight">
            <div class="text-center mb-4">
              {{-- <a href="/" class="navbar-brand navbar-brand-autodark"><img src="/logo1.png" height="36" alt=""></a> --}}
            </div>
            <div class="card card-md">
              <div class="card-body">
                <h2 class="h2 text-center mb-4">-- Masuk --</h2>
               @livewire('login-form')
                <div class="mb-0 mt-4">
                    <label class="form-label">
                      
                      <span class="form-label-description">
                        <a href="{{ route('author.forgot-password') }}">Saya Lupa Password</a>
                      </span>
                    </label>
                    <label class="form-label d-flex text-left">
                      <span class="form-label-description">
                        <a href="{{ route('home') }}">Kembali</a>
                      </span>
                    </label>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-lg d-none d-lg-block">
          <img src="/logo1.png" height="300" class="d-block mx-auto" alt="">
          <h1 class="text-center mt-2">Administrator</h1>
          <h1 class="text-center mt-2">Desa Toruakat</h1>
        </div>
      </div>
    </div>
  </div>

@endsection