<div>
    
    <div class="row">
        <div class="col-md-6 my-2">
            <div class="card">
                <div class="card-status-start bg-primary"></div>
                <div class="card-header mt-1">
                    <ul class="nav nav-tabs card-header-tabs">
                        <h3 class="d-flex ml-2">Menu</h3>
                        <li class="nav-item ms-auto">
                            <a href="" class="btn btn-sm btn-primary" data-bs-toggle='modal'
                                data-bs-target='#categories_modal'>Tambah Menu</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Menu</th>
                                    <th>Jumlah Kategori</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $menu)
                                    
                               
                                <tr>
                                    <td class="text-muted">{{ $menu->category_name }}</td>
                                    <td class="text-muted">
                                        {{ $menu->subcategories->count() }}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-primary">Edit</a>&nbsp;
                                            <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    <td colspan="3"><span class="text-danger">Tidak ada Menu yang ditemukan.</span></td>
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
                        <h3 class="d-flex ml-2">Kategori</h3>
                        <li class="nav-item ms-auto">
                            <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#subcategories_modal">Tambah Kategori</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Menu</th>
                                    <th>Parent Menu</th>
                                    <th>Jumlah Post</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-muted">Any Name</td>
                                    <td class="text-muted">
                                        Any Category
                                    </td>
                                    <td class="text-muted">
                                        20
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-primary">Edit</a>&nbsp;
                                            <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Menu add-->
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
                    <h5 class="modal-title">{{ $updateCategoryMode ? 'Update Menu' : 'Tambah Menu' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($updateCategoryMode)
                        <input type="hidden" wire:model="selected_category_id">
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Nama Menu</label>
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
    
    <!-- Modal Menu add end-->
    
    
    
    <!-- Modal Kategory add -->
    <div class="modal modal-blur fade" tabindex="-1" role="dialog" aria-hidden="true" id="subcategories_modal"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-label">Parent Menu</div>
                        <select class="form-select" wire:model='parent_category'>
                              <option value="">No Selected</option>
                              <option value="">1</option>
                              <option value="">2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="example-text-input" placeholder="Masukkan Nama Kategori">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Kategory add end-->

</div>
