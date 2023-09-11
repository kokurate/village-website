@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Profile')
@section('css') @livewireStyles
@section('js')  @livewireScripts
@section('pageHeader')

<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="{{ route('author.home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Profile</a></li>
              </ol>
          </div>
          <h3 class="page-title mt-2">
            Profile
          </h3>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('content')

<hr>
@livewire('author-profile-header')

<div class="row">
    <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs">
            <li class="nav-item">
              <a href="#tabs-detail" class="nav-link active" data-bs-toggle="tab">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4"></path>
                    <path d="M13.5 6.5l4 4"></path>
                    <path d="M16 19h6"></path>
                    <path d="M19 16v6"></path>
                 </svg>   <span class="p-2">Informasi Pribadi</span></a>
            </li>
            <li class="nav-item ms-auto">
              <a href="#tabs-password" class="nav-link" title="Settings" data-bs-toggle="tab"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                  <circle cx="12" cy="12" r="3" />
                </svg>  <span class="p-2">Ubah Kata Sandi</span></a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active show btn" id="tabs-detail">
              <h4></h4>
              <div>
               @livewire('author-personal-details')
              </div>
            </div>
            <div class="tab-pane btn" id="tabs-password">
              <div>
                @livewire('author-change-password-form')
              </div>
            </div>
          </div>
        </div>
      </div>
      
</div>
  

@endsection