@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('css')
  
<!-- Data Table-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  @livewireStyles 
@endsection
@section('js')  

<!-- Data Table-->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
  @livewireScripts 
@endsection
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
<h2>Selamat Datang <strong>{{ auth()->user()->name }}</strong></h2>

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

                
                    @forelse(\App\Models\Aparatur::all() as  $data)
                    <div class="carousel-item active">     
                      <img class="d-block w-100" alt="" src="{{ $data->image }}" >
                      <div class="carousel-caption-background d-none d-md-block"></div>
                      <div class="carousel-caption d-none d-md-block">
                        <h3>{{ $data->nama }}</h3>
                        <p>{{ $data->jabatan }}</p>
                      </div>
                    </div>
                    @empty
                    <span class="text-danger">Tidak Ada Data</span>
                    @endforelse
          
                   
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


                  @livewire('author-aparatur-desa')
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="heading-2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false">
                  <h3>Surat Online</h3>
                </button>
              </h2>
              <div id="collapse-2" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                <div class="accordion-body pt-0">
                  <hr>
                  <h2 class="mb-4 text-center">Daftar Pengajuan Surat Online</h2>
                  
                        @livewire('author-home-surat-online')
                 
                </div>
              </div>
            </div>
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


      window.addEventListener('deleteAparatur', function(event) {
            Swal.fire({
                title: event.detail.title,
                html: event.detail.html,
                icon: 'warning', // Use a warning icon
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Hapus',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                width: '500px',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteAparaturAction', event.detail.id);
                }
            });
        });

  </script>
  @endforeach

  <script>
    
        // Data Table 
        new DataTable('#surat_online', {
            scrollX: true,
            order: [[1, 'asc']], // Use 'desc' for descending order
            // columnDefs: [{
            //     targets: 6, // Adjust the column index to match the position of "Tanggal Pengajuan"
            //     visible: false
            // }]
        });

        // Detail Modal
        window.addEventListener('showDetailModal', function(e){
            $('#detail_modal').modal('show');
        });

  </script>

@endpush