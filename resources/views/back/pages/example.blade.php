@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Login')
@section('css') @livewireStyles
@section('js')  @livewireScripts
@section('pageHeader')

<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            Home
          </div>
          <h2 class="page-title">
            Dashboard
          </h2>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('content')

Page content here

@endsection