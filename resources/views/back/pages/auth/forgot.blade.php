@extends('back.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Login')
@section('content')

<div class="page page-center">
    <div class="container container-tight py-4">
      <div class="text-center mb-4">
        <a href="." class="navbar-brand navbar-brand-autodark"><img src="/back/static/logo.svg" height="36" alt=""></a>
      </div>
      <form class="card card-md" action="/back/" method="get" autocomplete="off" novalidate="">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Lupa kata sandi</h2>
          <p class="text-muted mb-4">Masukkan alamat email Anda, dan kata sandi anda akan direset dan dikirimkan melalui email kepada Anda</p>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Enter email">
          </div>
          <div class="form-footer">
            <a href="#" class="btn btn-primary w-100">
              <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path><path d="M3 7l9 6l9 -6"></path></svg>
              Kirimkan saya kata sandi baru
            </a>
          </div>
        </div>
      </form>
      <div class="text-center text-muted mt-3">
         Lupakan saja, <a href="{{ route('author.login') }}">kembalikan saya</a> ke layar masuk
      </div>
    </div>
  </div>
@endsection