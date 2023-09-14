@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Menu & Kategori')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Kategori & Subkategori</a></li>
                    </ol>
                </div>
                <h2 class="page-title">
                    Kategori & Subkategori
                </h2>
            </div>
        </div>
    </div>
</div>

@endsection
@section('content')

@livewire('categories')


@endsection

@push('js')
    <script>

        window.addEventListener('hideCategoriesModal', function(e){
            $('#categories_modal').modal('hide');
        });

        window.addEventListener('showCategoriesModal', function(e){
            $('#categories_modal').modal('show');
        });

        window.addEventListener('hideSubCategoriesModal', function(e){
            $('#subcategories_modal').modal('hide');
        });

        window.addEventListener('showSubCategoriesModal', function(e){
            $('#subcategories_modal').modal('show');
        });

        
        $('#categories_modal, #subcategories_modal').on('hidden.bs.modal', function(e){
          Livewire.emit('resetModalForm');
        });


        window.addEventListener('deleteCategory', function(event) {
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
                width: '400px',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteCategoryAction', event.detail.id);
                }
            });
        });

    </script>
@endpush