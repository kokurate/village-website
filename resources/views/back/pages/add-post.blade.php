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

<form action="" method="post" id="addPostForm">
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
                        <input type="file" class="form-control" name="feature_image">
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