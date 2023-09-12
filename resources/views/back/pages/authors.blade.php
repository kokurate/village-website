@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Daftar Pengguna') 
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
            <li class="breadcrumb-item active" aria-current="page"><a href="#">authors</a></li>
          </ol>
        </div>
        <h2 class="page-title">
          Daftar Pengguna
        </h2>
      </div>
    </div>
  </div>
</div>

@endsection
@section('content')

  @livewire('authors')

@endsection

@push('js')
  <script>

    $(window).on('hidden.bs.modal', function(){
                livewire.emit('resetForms');
            });

    window.addEventListener('hide_add_author_modal', function(event){
            $('#add_author_modal').modal('hide');
        });


    window.addEventListener('showEditAuthorModal', function(event){
        $('#edit_author_modal').modal('show');
    });
   
    
    window.addEventListener('hide_edit_author_modal', function(event){
        $('#edit_author_modal').modal('hide');
    });

  </script>
@endpush