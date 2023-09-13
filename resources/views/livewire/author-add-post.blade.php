<div>
    
    <form wire:submit.prevent='addPost()' action="" method="post" id="addPostForm">
        {{-- @csrf --}}
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
                            <input type="text" class="form-control" name="post_title" placeholder="Masukkan judul..." wire:model='post_title'>
                            @error('post_title') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea class="form-control" name="post_content" rows="8" placeholder="Content.." wire:model='post_content'></textarea>
                            @error('post_content') <span class="text-danger">{{ $message }}</span> @enderror
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
                              <select class="form-select" name="post_category" wire:model='post_category'>
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
                            @error('post_category') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Featured Image</div>
                            <input type="file" class="form-control" name="feature_image" wire:model='feature_image'>
                            @error('feature_image') <span class="text-danger">{{ $message }}</span>@enderror

                        </div>
                       
                        {{-- @if ($feature_image)
                            <div class="image_holder mb-2" style="max-width: 250px">
                                <img src="{{ optional($feature_image->temporaryUrl())->value }}" alt="" class="img-thumbnail">
                            </div>
                        @endif --}}

                        @if ($feature_image)
                            <div class="image_holder mb-2" style="max-width: 250px">
                                @php
                                    try {
                                        $temporaryUrl = $feature_image->temporaryUrl();
                                    } catch (\Exception $e) {
                                        $temporaryUrl = null;
                                    }
                                @endphp

                                @if ($temporaryUrl)
                                    <img src="{{ $temporaryUrl }}" alt="" class="img-thumbnail">
                                @else
                                    <!-- Handle error condition here, e.g., display a fallback image or message -->
                                    {{-- <img src="{{ asset('path/to/fallback-image.jpg') }}" alt="Fallback Image" class="img-thumbnail"> --}}
                                    <!-- Or display a message -->
                                    {{-- <p>Error: Unable to generate temporary URL for the image.</p> --}}
                                    <p class="text-danger">Error: Format gambar tidak benar.</p>
                                @endif
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary">Simpan Post</button>
                    </div>
                </div>
            </div>
    
        </div> <!-- End Row -->
    </form>

</div>
