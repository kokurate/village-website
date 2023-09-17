@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('css') @livewireStyles
@section('js')  @livewireScripts
@section('pageHeader')

<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            Home
          </div>
          <h2 class="page-title">
            Dashboard
          </h2>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('content')

<hr>
<h2>Selamat Data <strong>{{ auth()->user()->name }}</strong></h2>

<div class="page-body">
  <div class="container-xl">
    <div class="row">
      <div class="col-lg-4 col-sm-12 my-2">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Aparatur Desa</h3>
          </div>
            <div class="card">
              <div class="card-body">
              
                <div id="carousel-captions" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">

                
                    @foreach(\App\Models\Aparatur::all() as  $data)
                    <div class="carousel-item active">     
                      <img class="d-block w-100" alt="" src="{{ $data->image }}" >
                      <div class="carousel-caption-background d-none d-md-block"></div>
                      <div class="carousel-caption d-none d-md-block">
                        <h3>{{ $data->nama }}</h3>
                        <p>{{ $data->jabatan }}</p>
                      </div>
                    </div>
                    @endforeach
          
                   
                  </div>
                  <a class="carousel-control-prev" href="#carousel-captions" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carousel-captions" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </a>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="col-lg-8 col-sm-12 my-2">
        <div class="card">

          <div class="accordion" id="accordion-example">
            <div class="accordion-item">
              <h2 class="accordion-header" id="heading-1">
                <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true">
                 <h3>Aparatur Desa</h3>
                </button>
              </h2>
              <div id="collapse-1" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                <div class="accordion-body pt-0">
                  
                  @livewire('author-add-aparatur-form')

                  <hr>

                  <div class="card-table table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Jabatan</th>
                          <th>Foto</th>
                          <th>Tambah Gambar</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse(\App\Models\Aparatur::all() as $data)
                        <tr>
                          <td>{{ $data->nama }}</td>
                          <td>{{ $data->jabatan }}</td>
                          <td>
                            @if ($data->image == asset('back/dist/img/aparatur/default-img.png') )
                                 <span class="text-danger"><strong>X</strong></span>
                            @else
                                <span class="text-success"><strong>Yes</strong></span>
                            @endif
                          </td>
                          <td>
                            <div class="btn-group">
                              <input type="file" name="gambar{{ $data->id }}" id="gambar{{ $data->id }}" class="" >
                              {{-- <a href="#" class="btn btn-sm btn-primary" wire:click.prevent='editAgama({{ $data->id }})'>Edit</a>&nbsp; --}}
                            </div>
                          </td>
                          <td>
                            <a href="#" class="btn btn-sm btn-danger" >Hapus</a>
                          </td>
                        </tr>
                        @empty
                        <tr>
                          <td>
                            <span class="text-danger">Tidak ada data yang ditemukan</span>
                          </td>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            {{-- <div class="accordion-item">
              <h2 class="accordion-header" id="heading-2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false">
                  Accordion Item #2
                </button>
              </h2>
              <div id="collapse-2" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                <div class="accordion-body pt-0">
                  <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
              </div>
            </div> --}}
            </div>
          </div>


        </div>
    </div>
  </div>

  </div>
</div>

@endsection
@push('js')

  @foreach(\App\Models\Aparatur::all() as $data)
  <script>
      $('#gambar{{ $data->id }}').ijaboCropTool({
          preview: '.image-previewer',
          setRatio: 7/8,
          allowedExtensions: ['jpg', 'jpeg', 'png'],
          buttonsText: ['CROP', 'QUIT'],
          buttonsColor: ['#30bf7d', '#ee5155', -15],
          processUrl:'{{ route("author.cropAparatur",  $data->id ) }}',
          withCSRF: ['_token', '{{ csrf_token() }}'],
          onSuccess: function (message, element, status) {
            toastr.success(message);
          },
          onError: function (message, element, status) {
            toastr.error(message);
          }
      });
  </script>
  @endforeach

@endpush