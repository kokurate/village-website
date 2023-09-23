@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Tambah Post Baru')
{{-- @section('css') @livewireStyles
@section('js') @livewireScripts --}}
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

{{-- <form action="{{ route('author.posts.update-post', ['post_slug' => Request('post_slug')]) }}" method="post" id="editPostForm" enctype="multipart/form-data"> --}}
<form action="{{ route('author.posts.update-post', ['post_id' => Request('post_id')]) }}" method="post" id="editPostForm" enctype="multipart/form-data">
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
                        <input type="text" class="form-control @error('post_title') is-invalid @enderror" name="post_title" placeholder="Masukkan judul..." value="{{ $post->post_title }}">
                        <span class="text-danger error-text post_title_error"></span>
                    </div>
                    <div class="mb-3">
                        <span class="text-danger error-text post_content_error"></span>
                        <label class="form-label">Content</label>
                        <textarea class="ckeditor form-control @error('post_content') is-invalid @enderror" name="post_content" id="post_content" rows="8" placeholder="Content..">{!! $post->post_content !!}</textarea>
                        
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
                          <select class="form-select @error('post_category') is-invalid @enderror" name="post_category">
                            <option value="">Pilih Kategori</option>
                            @foreach(\App\Models\Category::with('subcategories')->get() as $category)
                                <optgroup label="{{ $category->category_name }}">
                                    @foreach($category->subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}" {{ $post->category_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->subcategory_name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                            @foreach(\App\Models\SubCategory::where('parent_category', 0)->get() as $uncategorized)
                                <option value="{{ $uncategorized->id }}" {{ $post->category_id == $uncategorized->id ? 'selected' : '' }}>{{ $uncategorized->subcategory_name }}</option>
                            @endforeach
                          </select>
                          <span class="text-danger error-text post_category_error"></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Featured Image</div>
                        <input type="file" class="form-control" name="featured_image" id="image-input">
                        <span class="text-danger error-text featured_image_error"></span>
                    </div>
                    <div class="image_holder mb-2" style="max-width: 250px">
                        <img src="{{ $post->featured_image ? asset($post->featured_image) : '' }}" alt="" class="img-thumbnail" id="image-previewer">
                    </div>
                    <button type="submit" class="btn btn-primary">Perbarui Post</button>
                </div>
            </div>
        </div>

    </div> <!-- End Row -->
</form>

@endsection

@push('js')


  <!-- CK Editor -->
  <script src="/ckeditor/ckeditor.js"></script>



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


        // form submit
        $('form#editPostForm').on('submit', function(e){
        e.preventDefault();
        toastr.remove(); 
        var post_content = CKEDITOR.instances.post_content.getData();
        var form = this;
        var fromdata = new FormData(form);
            fromdata.append('post_content', post_content);
        $.ajax({
            url:$(form).attr('action'),
            method:$(form).attr('method'),
            data:fromdata,
            processData:false,
            dataType :'json',
            contentType:false,
            beforeSend:function(){
                $(form).find('span.error-text').text('');
            },
            success:function(response){
                toastr.remove();
                if(response.code == 1){
                    $(form)[0].reset();
                    $('div.image_holder').html('');
                    // CKEDITOR.instances.post_content.setData('';)
                    // $('div.image_holder').find('img').attr('src','');
                    // CKEDITOR.instances.post_content.setData('');
                    // Add a delay of 2 seconds before redirecting
                    setTimeout(function () {
                    // Redirect back to the previous page
                    var currentURL = window.location.href;
                    window.location.href = currentURL;
                    }, 1000);
                    
                    toastr.success(response.msg);
                }else{
                    toastr.error(response.msg);
                }
            },
            error:function(response){
                toastr.remove();
                $.each(response.responseJSON.errors, function(prefix,val){
                    $(form).find('span.'+prefix+'_error').text(val[0]);
                });
            }
        });
    });
    </script>
@endpush