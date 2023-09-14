<div>
    
    <div class="row">
        <div class="col-md-6 my-2">
            <div class="card">
                <div class="card-status-start bg-primary"></div>
                <div class="card-header mt-1">
                    <ul class="nav nav-tabs card-header-tabs">
                        <h3 class="d-flex ml-2">Kategori</h3>
                        <li class="nav-item ms-auto">
                            <a href="" class="btn btn-sm btn-primary" data-bs-toggle='modal'
                                data-bs-target='#categories_modal'>Tambah Kategori</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Kategori</th>
                                    <th>Jumlah Subkategori</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    
                               
                                <tr>
                                    <td class="text-muted" style="font-size: 14px">{{ $category->category_name }}</td>
                                    <td class="text-muted" style="font-size: 14px">
                                        {{ $category->subcategories->count() }}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-primary" wire:click.prevent='editCategory({{ $category->id }})'>Edit</a>&nbsp;
                                            <a href="#" class="btn btn-sm btn-danger" wire:click.prevent='deleteCategory({{ $category->id }})'>Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    <td colspan="3"><span class="text-danger">Tidak ada Kategori yang ditemukan.</span></td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-6 my-2">
            <div class="card">
                <div class="card-status-start bg-success"></div>
                <div class="card-header mt-1">
                    <ul class="nav nav-tabs card-header-tabs">
                        <h3 class="d-flex ml-2">Subkategori</h3>
                        <li class="nav-item ms-auto">
                            <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#subcategories_modal">Tambah Subkategori</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Subkategori</th>
                                    <th>Parent Kategori</th>
                                    <th>Jumlah Post</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subcategories as $subcategory)
                                <tr>
                                  <td class="text-muted" style="font-size: 14px">{{ $subcategory->subcategory_name }}</td>
                                  <td class="text-muted" style="font-size: 14px">
                                    {{ $subcategory->parentcategory->category_name ?? '
                                    Tidak dikategorikan
                                    '}}
                                  </td>
                                  <td class="text-muted" style="font-size: 14px">{{ $subcategory->posts->count() }}</td>
                                  <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-primary" wire:click.prevent='editSubCategory({{ $subcategory->id }})'>Edit</a> &nbsp;
                                        <a href="" class="btn btn-sm btn-danger" wire:click.prevent='deleteSubCategory({{ $subcategory->id }})' >Hapus</a>
                                    </div>
                                  </td>
                                </tr>
                                @empty
                                      <td colspan="4"><span class="text-danger">Tidak ada Subkategori yang ditemukan.</span></td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Kategori -->
    <div wire:ignore.self class="modal modal-blur fade" tabindex="-1" role="dialog" aria-hidden="true" id="categories_modal"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post"
            @if($updateCategoryMode)
                wire:submit.prevent='updateCategory()'
            @else
                wire:submit.prevent='addCategory'
            @endif
            >
                <div class="modal-header">
                    <h5 class="modal-title">{{ $updateCategoryMode ? 'Update Kategori' : 'Tambah Kategori' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($updateCategoryMode)
                        <input type="hidden" wire:model="selected_category_id">
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="example-text-input" placeholder="Masukkan Nama Menu" wire:model="category_name">
                    @error('category_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">{{ $updateCategoryMode ? 'Update' : 'Simpan'}}</button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Modal Kategori  end-->
    
    
    
    <!-- Modal SubKategory add -->
    <div wire:ignore.self class="modal modal-blur fade" tabindex="-1" role="dialog" aria-hidden="true" id="subcategories_modal"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post"
            @if($updateSubCategoryMode)
                 wire:submit.prevent ='updateSubCategory()'
            @else
                wire:submit.prevent='addSubCategory()'
            @endif
            >
                <div class="modal-header">
                    <h5 class="modal-title">{{ $updateSubCategoryMode ? 'Update SubCategory' : 'Tambah SubCategory' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($updateSubCategoryMode)
                        <input type="hidden" wire:model='selected_subcategory_id'>
                    @endif
                    <div class="mb-3">
                        <div class="form-label">Parent Category</div>
                        <select class="form-select" wire:model='parent_category'>
                            @if(!$updateSubCategoryMode)
                              <option value="">No Selected</option>
                            @endif
                          @foreach (\App\Models\Category::all() as $category)
                              <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                          @endforeach
                        </select>
                        <span class="text-danger"> @error('parent_category') {{ $message }} </span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Subkategori</label>
                        <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror" name="example-text-input" placeholder="Masukkan nama subkategori" wire:model='subcategory_name'>
                        @error('subcategory_name')
                             <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">{{ $updateSubCategoryMode ? 'Update' : 'Simpan' }}</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal SubKategory add end-->

</div>
