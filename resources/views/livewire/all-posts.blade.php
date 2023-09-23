<div>
   
    <div class="page-body">
        <div class="container-xl">
          <div class="row g-4">
            <div class="col-md-3">
              <div autocomplete="off" class="sticky-top"> <!-- ============ Start Form ============ -->
                <div class="form-label">Order By</div>
                <div class="mb-4">
                  <select class="form-select" wire:model='orderBy'>
                    <option value="asc">Terlama</option>
                    <option value="desc">Terbaru</option>
                  </select>
                </div>
                <div class="form-label">Filter by Kategori</div>
                <div class="mb-4">
                  <label class="form-check">
                    <input type="radio" class="form-check-input" name="form-salary" value="" checked="" wire:model='category'>
                    <span class="form-check-label">Semua</span>
                  </label>
                  @foreach (\App\Models\SubCategory::whereHas('posts')->get() as $category)
                  <label class="form-check">
                    <input type="radio" class="form-check-input" name="form-salary" value="{{ $category->id }}" checked="" wire:model='category'>
                    <span class="form-check-label">{{ $category->subcategory_name }}</span>
                  </label>
                  @endforeach
                  
                </div>
               
                @if(auth()->user()->type == 1)
                <div class="form-label">User</div>
                <div class="mb-4">
                  <select class="form-select" wire:model='author'>
                    <option value="">-- Filter by user --</option>
                    @foreach(\App\Models\User::whereHas('posts')->get() as $author)
                      <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                  </select>
                </div>
                @endif
        
              </div>
            </div>
            <div class="col-md-9">
              <div class="row g-2 align-items-center">
              {{-- <div class="row g-2 align-items-center sticky-top" style="background-color: white;"> --}}
                <!-- Page title actions -->
                <div class="col ms-auto d-print-none mb-4">
                  <label for="" class="form-label">Search</label>
                  <input type="text" class="form-control" placeholder="Keyword..." wire:model='search'>
                </div>
              </div>

              <div class="row row-cards">
                <div class="space-y">
    
                    @forelse($posts as $post)
                    <div class="card">
                        <div class="row g-0">
                        <div class="col-auto">
                            <div class="card-body">
                            <div class="avatar avatar-xl" style="background-image: url({{ $post->featured_image }})"></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body ps-0">
                            <div class="row">
                                <div class="col">
                                <h3 class="mb-0"><a href="{{ route('read_post', $post->post_slug) }}" target="__blank">{{ $post->post_title }}</a></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="mt-3 list-inline list-inline-dots mb-0 text-muted d-sm-block d-none">
                                        <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-smile-beam" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 21a9 9 0 1 1 0 -18a9 9 0 0 1 0 18z"></path>
                                                <path d="M10 10c-.5 -1 -2.5 -1 -3 0"></path>
                                                <path d="M17 10c-.5 -1 -2.5 -1 -3 0"></path>
                                                <path d="M14.5 15a3.5 3.5 0 0 1 -5 0"></path>
                                             </svg>
                                            {{ $post->author->name }}
                                        </div>
                                        <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                                <path d="M10 12h4v4h-4z"></path>
                                             </svg>
                                            {{ $post->subcategory->subcategory_name }}
                                        </div>
                                    </div>
                                    <div class="mt-3 list mb-0 text-muted d-block d-sm-none">
                                        <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-smile-beam" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                              <path d="M12 21a9 9 0 1 1 0 -18a9 9 0 0 1 0 18z"></path>
                                              <path d="M10 10c-.5 -1 -2.5 -1 -3 0"></path>
                                              <path d="M17 10c-.5 -1 -2.5 -1 -3 0"></path>
                                              <path d="M14.5 15a3.5 3.5 0 0 1 -5 0"></path>
                                          </svg>
                                          {{ $post->author->name }}
                                        </div>
                                        <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                              <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                                              <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                              <path d="M10 12h4v4h-4z"></path>
                                          </svg>
                                          {{ $post->subcategory->subcategory_name }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-auto">
                                    <div class="mt-3 badges">
                                        {{-- <a href="#" class="badge badge-outline text-muted border fw-normal badge-pill">Edit</a> --}}
                                        {{-- <a href="#" class="badge badge-outline text-muted border fw-normal badge-pill">Hapus</a> --}}
                                        <a class="btn position-relative" href="{{ route('author.posts.edit-post',['post_id' => $post->id]) }}">Edit <span class="badge bg-cyan badge-notification badge-blink"></span></a>
                                        {{-- <a class="btn position-relative" href="{{ route('author.posts.edit-post',['post_slug' => $post->post_slug]) }}">Edit <span class="badge bg-cyan badge-notification badge-blink"></span></a> --}}
                                        <a class="btn position-relative" wire:click.prevent='deletePost({{ $post->id }})' ><span class="badge bg-red badge-notification badge-blink"></span>Hapus </a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    @empty
                        <span class="text-danger">Tidak ada post yang ditemukan</span>
                    @endforelse
    
    
                </div>
              </div>
                <!-- Start Pagination-->
                <div class="row mt-4">
                    <div class="d-flex justify-content-center">
                        {{ $posts->links('livewire::bootstrap') }}
                    </div>
                </div>
                <!-- End Pagination-->
            </div>
          </div>
        </div>
    </div>
    
    

</div>
