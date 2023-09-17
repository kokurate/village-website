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
    <div class="row row-cards">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Response times across regions in the last day</h3>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Uptime incidents per day</h3>
          </div>
            <div class="card">
              <div class="card-body">
                <div id="carousel-captions" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item">
                      <img class="d-block w-100" alt="" src="/back/static/photos/hero.jpg" ">
                      <div class="carousel-caption-background d-none d-md-block"></div>
                      <div class="carousel-caption d-none d-md-block">
                        <h3>Slide label</h3>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" alt="" src="/back/static/photos/young-entrepreneur-working-from-a-modern-cafe-2.jpg">
                      <div class="carousel-caption-background d-none d-md-block"></div>
                      <div class="carousel-caption d-none d-md-block">
                        <h3>Slide label</h3>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                      </div>
                    </div>
                    <div class="carousel-item active">
                      <img class="d-block w-100" alt="" src="/back/static/photos/woman-working-on-laptop-at-home-office.jpg">
                      <div class="carousel-caption-background d-none d-md-block"></div>
                      <div class="carousel-caption d-none d-md-block">
                        <h3>Slide label</h3>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                      </div>
                    </div>
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
      <div class="col-12">
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
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse(\App\Models\Aparatur::all() as $data)
                        <tr>
                          <td>{{ $data->nama }}</td>
                          <td>{{ $data->jabatan }}</td>
                          <td>
                            <div class="btn-group">
                              <a href="#" class="btn btn-sm btn-primary" wire:click.prevent='editAgama({{ $data->id }})'>Edit</a>&nbsp;
                              <a href="#" class="btn btn-sm btn-danger" wire:click.prevent='deleteAgama({{ $data->id }})'>Hapus</a>
                          </div>
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