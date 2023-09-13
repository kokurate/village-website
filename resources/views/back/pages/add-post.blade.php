@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Tambah Post Baru')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Tambah Post</a></li>
                    </ol>
                </div>
                <h2 class="page-title">
                    Tambahkan Postingan Baru
                </h2>
            </div>
        </div>
    </div>
</div>

@endsection
@section('content')

<form action="{{ route('author.posts.create') }}" method="post" id="addPostForm" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-9 my-3">
            <div class="card">
                <div class="progress card-progress">
                    <div class="progress-bar bg-red" style="width: 20%" role="progressbar" aria-valuenow="20"
                        aria-valuemin="0" aria-valuemax="100" aria-label="20% Complete">
                        {{-- <span class="visually-hidden">20% Complete</span> --}}
                    </div>
                </div>
                <div class="card-body">
                    {{-- <h3 class="card-title">
                        <a href="#">{{ auth()->user()->name }}</a>
                        <span class="badge bg-danger ms-2">{{ auth()->user()->authorType->name }}</span>
                    </h3> --}}
                    <div class="mb-3">
                        <label class="form-label">Judul Post</label>
                        <input type="text" class="form-control" name="post_title" placeholder="Masukkan judul...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea class="form-control" name="post_content" rows="8" placeholder="Content.."></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 my-3">
            <div class="card">
                <div class="progress card-progress">
                    <div class="progress-bar bg-green" style="width: 20%" role="progressbar" aria-valuenow="20"
                        aria-valuemin="0" aria-valuemax="100" aria-label="20% Complete">
                        <span class="visually-hidden">20% Complete</span>
                    </div>
                </div>
                <div class="card-body">
                    {{-- <h3 class="card-title">
                        <a href="#">Tabler React</a>
                    </h3> --}}
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <div>
                          <select class="form-select" name="post_category">
                            <option value="">Pilih Kategori</option>
                            @foreach(\App\Models\Category::with('subcategories')->get() as $category)
                                <optgroup label="{{ $category->category_name }}">
                                    @foreach($category->subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                            @foreach(\App\Models\SubCategory::where('parent_category', 0)->get() as $uncategorized)
                                <option value="{{ $uncategorized->id }}">{{ $uncategorized->subcategory_name }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Featured Image</div>
                        <input type="file" class="form-control" name="feature_image" id="image-input">
                    </div>
                    <div class="image_holder mb-2" style="max-width: 250px">
                        <img src="" alt="" class="img-thumbnail" id="image-previewer">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Post</button>
                </div>
            </div>
        </div>

    </div> <!-- End Row -->
</form>

@endsection

@push('js')
    <script>

        // start Image Preview and validation
        $(function () {
            // Get references to the file input and image element
            var fileInput = document.getElementById('image-input');
            var imagePreview = document.getElementById('image-previewer');
            // Add an event listener to the file input
            fileInput.addEventListener('change', function () {
                // Check if a file is selected
                if (fileInput.files && fileInput.files[0]) {
                   
                    // Check allowed extensions
                    var allowedExtensions = ['jpg', 'jpeg', 'png'];
                    var fileExtension = fileInput.files[0].name.split('.').pop().toLowerCase();
                    var isAllowedExtension = allowedExtensions.indexOf(fileExtension) !== -1;
                    if (!isAllowedExtension) {
                        alert('Ekstensi gambar yang diperbolehkan: jpg, jpeg, png');
                        // Clear the file input to prevent submission
                        fileInput.value = '';
                    } else {
                        // Check image shape (assuming you have specific dimensions for rectangular images)
                        var image = new Image();
                        image.src = window.URL.createObjectURL(fileInput.files[0]);
                        image.onload = function () {
                            var width = this.width;
                            var height = this.height;
                            // Define your rectangular shape criteria here
                            var isRectangular = width > height;
                            if (!isRectangular) {
                                alert('Bentuk gambar harus landscape');
                                // Clear the file input to prevent submission
                                fileInput.value = '';
                            }

                            //preview the image if there's not error validation
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                // Update the image preview
                                imagePreview.src = e.target.result;
                            };
                            reader.readAsDataURL(fileInput.files[0]);
                        };
                    }
                }
            });
        });
        // End Image Preview and validation
    </script>
@endpush