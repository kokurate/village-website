<div>
    
    <div class="page-header d-print-none mb-4">
        <div class="container-xl">
          <div class="row g-2 align-items-center">
            <div class="col">
              <h2 class="page-title">
                Users
              </h2>
              <div class="text-muted mt-1">1-18 of 413 people</div>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
              <div class="d-flex">
                <input type="search" class="form-control d-inline-block w-9 me-3" placeholder="Cari pengguna…">
                <a href="#" class="btn btn-primary" data-bs-target='#add_author_modal' data-bs-toggle='modal'>
                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                  </svg>
                  Pengguna Baru
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row row-cards">

        @forelse ($authors as $author)
            
        
        <div class="col-md-6 col-lg-3">
          <div class="card">
            <div class="card-body p-4 text-center">
              <span class="avatar avatar-xl mb-3 rounded" style="background-image: url({{ $author->picture }})"></span>
              <h3 class="m-0 mb-1"><a href="#">{{ $author->name }}</a></h3>
              <div class="text-muted">{{ $author->email }}</div>
              <div class="mt-3">
                <span class="badge bg-purple-lt">{{ $author->authorType->name }}</span>
              </div>
            </div>
            <div class="d-flex">
              <a href="#" class="card-btn" wire:click.prevent='editAuthor({{ $author }})'>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                    <path d="M16 5l3 3"></path>
                 </svg>
                Edit
              </a>
              <a href="#" class="card-btn">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M18 6l-12 12"></path>
                    <path d="M6 6l12 12"></path>
                 </svg>
                Delete
              </a>
            </div>
          </div>
        </div>
        @empty
            <span class="text-danger">Pengguna tidak ditemukan!</span>
        @endforelse

      </div>

      
    <!-- Modal Add  -->
    <div wire:ignore.self class="modal modal-blur fade" id="add_author_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Pengguna</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='addAuthor()' method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="example-text-input" placeholder="Kokurate" wire:model='name'>
                        <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                    </div>
                    @error('name') is-invalid @enderror
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="example-text-input" placeholder="kokurate@dev.com" wire:model='email'>
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="example-text-input" placeholder="kokurate123" wire:model='username'>
                        <span class="text-danger">@error('username') {{ $message }} @enderror</span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tipe Pengguna</label>
                        <div>
                          <select class="form-select" wire:model='author_type'>
                            <option value="">--- No Selected ---</option>
                            @foreach(\App\Models\Type::all() as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <span class="text-danger">@error('author_type') {{ $message }} @enderror</span>
                    </div>

                    {{-- <div class="mb-3">
                        <div class="form-label">Is direct publisher</div>
                        <div>
                          <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="direct_publisher" value="0" wire:model='direct_publisher'>
                            <span class="form-check-label">No</span>
                          </label>
                          <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="direct_publisher" value="1" wire:model='direct_publisher'>
                            <span class="form-check-label">Yes</span>
                          </label>
                        </div>
                        <span class="text-danger">@error('direct_publisher') {{ $message }} @enderror</span>
                      </div> --}}

                      <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>

                </form>
            </div>

          </div>
        </div>
      </div> 
      <!-- End Modal  add -->

       <!-- Modal Edit -->
    <div wire:ignore.self class="modal modal-blur fade" id="edit_author_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Pengguna</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='updateAuthor()' method="post">
                  <input type="hidden" wire:model='selected_author_id'>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="example-text-input" placeholder="Masukkan Nama" wire:model='name'>
                        <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                    </div>
  
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="example-text-input" placeholder="Masukkan email pengguna" wire:model='email'>
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                    </div>
  
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="example-text-input" placeholder="Masukkan nama pengguna" wire:model='username'>
                        <span class="text-danger">@error('username') {{ $message }} @enderror</span>
                    </div>
  
                    <div class="mb-3">
                        <label class="form-label">Tipe Pengguna</label>
                        <div>
                          <select class="form-select" wire:model='author_type'>
                            @foreach(\App\Models\Type::all() as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <span class="text-danger">@error('author_type') {{ $message }} @enderror</span>
                    </div>
  
                    {{-- <div class="mb-3">
                        <div class="form-label">Is direct publisher</div>
                        <div>
                          <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="direct_publisher" value="0" wire:model='direct_publisher'>
                            <span class="form-check-label">No</span>
                          </label>
                          <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="direct_publisher" value="1" wire:model='direct_publisher'>
                            <span class="form-check-label">Yes</span>
                          </label>
                        </div>
                        <span class="text-danger">@error('direct_publisher') {{ $message }} @enderror</span>
                      </div> --}}
  
                      <div class="mb-3">
                        <div class="form-label">Blocked</div>
                        <label class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" checked="" wire:model='blocked'>
                          <span class="form-check-label"></span>
                        </label>
                      </div>
  
                      <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                      </div>
  
                </form>
            </div>
  
          </div>
        </div>
      </div> 
      <!-- End Modal Edit -->

</div>
