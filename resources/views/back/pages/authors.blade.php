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

    // Sweet alert 2
    window.addEventListener('deleteAuthor', function(event) {
        Swal.fire({
            title: event.detail.title,
            html: event.detail.html,
            icon: 'warning', // Use a warning icon
            showCloseButton: true,
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus',
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            width: '500px',
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('deleteAuthorAction', event.detail.id);
            }
        });
    });

  </script>
@endpush