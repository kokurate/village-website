@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Data Desa | Penduduk')
@section('css')
    <!-- Data Table-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    @livewireStyles 
@endsection
@section('js')  
    <!-- Data Table-->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    @livewireScripts 
@endsection
@section('pageHeader')

<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="{{ route('author.home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Penduduk</a></li>
              </ol>
          </div>
          <h2 class="page-title">
            Data Penduduk
          </h2>
        </div>
      </div>
    </div>
</div>

@endsection
@section('content')

    @livewire('data-desa-penduduk')

@endsection

@push('js')
<script>
     // Data Table 
     new DataTable('#data_penduduk', {
            // order: [[0, 'desc']], // Use 'desc' for descending order
            scrollX: true,
            paging:   true,
            ordering: true,
            info:     true,
        });


        window.addEventListener('hidePendudukModal', function(e){
            $('#penduduk_modal').modal('hide');
        });


        window.addEventListener('showPendudukModal', function(e){
            $('#penduduk_modal').modal('show');
        });

        $('#penduduk_modal').on('hidden.bs.modal', function(e){
          Livewire.emit('resetModalForm');
        });

        window.addEventListener('deletePenduduk', function(event) {
            Swal.fire({
                title: event.detail.title,
                html: event.detail.html,
                icon: 'warning',
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
                    Livewire.emit('deletePendudukAction', event.detail.id);
                }
            });
        });


</script>


@endpush