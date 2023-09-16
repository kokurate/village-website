@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Data Desa | Pekerjaan')
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
              </ol>
          </div>
          <h2 class="page-title">
            Mata Pencaharian
          </h2>
        </div>
      </div>
    </div>
</div>

@endsection
@section('content')

    @livewire('data-desa-pekerjaan')

@endsection
@push('js')
    <script>

        window.addEventListener('hidePekerjaanModal', function(e){
            $('#pekerjaan_modal').modal('hide');
        });


        window.addEventListener('showPekerjaanModal', function(e){
            $('#pekerjaan_modal').modal('show');
        });

        $('#pekerjaan_modal').on('hidden.bs.modal', function(e){
          Livewire.emit('resetModalForm');
        });

        window.addEventListener('deletePekerjaan', function(event) {
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
                    Livewire.emit('deletePekerjaanAction', event.detail.id);
                }
            });
        });

    </script>
@endpush