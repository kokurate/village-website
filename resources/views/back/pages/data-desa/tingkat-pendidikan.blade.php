@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Data Desa | Tingkat Pendidikan')
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
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Data Desa</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Tingkat Pendidikan</a></li>
              </ol>
          </div>
          <h2 class="page-title">
            Tingkat Pendidikan
          </h2>
        </div>
      </div>
    </div>
</div>

@endsection
@section('content')

    @livewire('data-desa-tingkat-pendidikan')

@endsection
@push('js')
    <script>

        window.addEventListener('hideTingkatPendidikanModal', function(e){
            $('#tingkat_pendidikan_modal').modal('hide');
        });


        window.addEventListener('showTingkatPendidikanModal', function(e){
            $('#tingkat_pendidikan_modal').modal('show');
        });

        $('#tingkat_pendidikan_modal').on('hidden.bs.modal', function(e){
          Livewire.emit('resetModalForm');
        });

        window.addEventListener('deleteTingkatPendidikan', function(event) {
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
                    Livewire.emit('deleteTingkatPendidikanAction', event.detail.id);
                }
            });
        });

    </script>
@endpush