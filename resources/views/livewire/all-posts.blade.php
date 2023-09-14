<div>
   
    <div class="page-body">
        <div class="container-xl">
          <div class="row g-4">
            <div class="col-md-3">
              <form action="./" method="get" autocomplete="off" novalidate="" class="sticky-top">
                <div class="form-label">Remote</div>
                <div class="mb-4">
                  <label class="form-check form-switch">
                    <input class="form-check-input" type="checkbox">
                    <span class="form-check-label form-check-label-on">On</span>
                    <span class="form-check-label form-check-label-off">Off</span>
                  </label>
                </div>
                <div class="form-label">Salary Range</div>
                <div class="mb-4">
                  <label class="form-check">
                    <input type="radio" class="form-check-input" name="form-salary" value="1" checked="">
                    <span class="form-check-label">$20K - $50K</span>
                  </label>
                  <label class="form-check">
                    <input type="radio" class="form-check-input" name="form-salary" value="2" checked="">
                    <span class="form-check-label">$50K - $100K</span>
                  </label>
                  <label class="form-check">
                    <input type="radio" class="form-check-input" name="form-salary" value="3">
                    <span class="form-check-label">&gt; $100K</span>
                  </label>
                  <label class="form-check">
                    <input type="radio" class="form-check-input" name="form-salary" value="4">
                    <span class="form-check-label">Drawing / Painting</span>
                  </label>
                </div>
               
                <div class="form-label">Location</div>
                <div class="mb-4">
                  <select class="form-select">
                    <option>Anywhere</option>
                    <option>London</option>
                    <option>San Francisco</option>
                    <option>New York</option>
                    <option>Berlin</option>
                  </select>
                </div>
        
              </form>
            </div>
            <div class="col-md-9">
              <div class="row row-cards">
                <div class="space-y">
    
                    @forelse($posts as $post)
                    <div class="card">
                        <div class="row g-0">
                        <div class="col-auto">
                            <div class="card-body">
                            <div class="avatar avatar-xl" style="background-image: url(/storage/images/post_images/{{ $post->featured_image }})"></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body ps-0">
                            <div class="row">
                                <div class="col">
                                <h3 class="mb-0"><a href="#" target="__blank">{{ $post->post_title }}</a></h3>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                        CMS Max</div>
                                        <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                        Full-time</div>
                                        <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                        Remote / USA</div>
                                    </div>
                                </div>
                                <div class="col-md-auto">
                                    <div class="mt-3 badges">
                                        {{-- <a href="#" class="badge badge-outline text-muted border fw-normal badge-pill">Edit</a> --}}
                                        {{-- <a href="#" class="badge badge-outline text-muted border fw-normal badge-pill">Hapus</a> --}}
                                        <button class="btn position-relative">Edit <span class="badge bg-cyan badge-notification badge-blink"></span></button>
                                        <button class="btn position-relative"><span class="badge bg-red badge-notification badge-blink"></span>Hapus </button>
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
