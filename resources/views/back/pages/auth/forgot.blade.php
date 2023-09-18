@extends('back.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Forgot Password')
@section('css') @livewireStyles
@section('js')  @livewireScripts
@section('content')

<div class="page page-center">
    <div class="container container-tight py-4">
      <div class="text-center mb-4">
        <a href="{{ route('home') }}" class="navbar-brand navbar-brand-autodark"><img src="/logo1.png" height="36" alt="" style="width:70px;height:auto;"></a>
      </div>
      @livewire('forgot-form')
      <div class="text-center text-muted mt-3">
         Lupakan saja, <a href="{{ route('author.login') }}">kembalikan saya</a> ke layar masuk
      </div>
    </div>
  </div>
@endsection