@extends('back.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Reset Kata Sandi')
@section('css') @livewireStyles
@section('js') @livewireScripts
@section('content')

<div class="page page-center">
    <div class="container container-normal py-4">
      <div class="row align-items-center g-4">
        <div class="col-lg">
          <div class="container-tight">
            <div class="text-center mb-4">
              <a href="{{ route('home') }}" class="navbar-brand navbar-brand-autodark"><img src="/logo1.png" height="36" alt="Logo" style="width:75px;height:auto;"></a>
            </div>
            <div class="card card-md">
              <div class="card-body">
                <h2 class="h2 text-center mb-4">Reset Password</h2>
               
                @livewire('reset-form')
                
                <div class="mb-0 mt-5 text-center">
                    <label class="form-check">
                        <a href="{{ route('author.login') }}">Kembali Ke Halaman Login</a>
                    </label>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection