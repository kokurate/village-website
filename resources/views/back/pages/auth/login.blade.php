@extends('back.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Login')
@section('content')

<div class="page page-center">
    <div class="container container-normal py-4">
      <div class="row align-items-center g-4">
        <div class="col-lg">
          <div class="container-tight">
            <div class="text-center mb-4">
              <a href="." class="navbar-brand navbar-brand-autodark"><img src="/back/static/logo.svg" height="36" alt=""></a>
            </div>
            <div class="card card-md">
              <div class="card-body">
                <h2 class="h2 text-center mb-4">-- Masuk --</h2>
                <form action="/back/" method="get" autocomplete="off" novalidate="">
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="your@email.com" autocomplete="off">
                  </div>
                  <div class="mb-2">
                    <label class="form-label">
                      Password
                    </label>
                    <div class="input-group input-group-flat">
                      <input type="password" class="form-control" placeholder="Your password" autocomplete="off">
                      <span class="input-group-text">
                        <a href="#" class="link-secondary" data-bs-toggle="tooltip" aria-label="Show password" data-bs-original-title="Show password"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path></svg>
                        </a>
                      </span>
                    </div>
                  </div>
                  <div class="mb-2">
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Masuk</button>
                  </div>
                </form>
                <div class="mb-0 mt-4">
                    <label class="form-label">
                      
                      <span class="form-label-description">
                        <a href="{{ route('author.forgot-password') }}">Saya Lupa Password</a>
                      </span>
                    </label>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-lg d-none d-lg-block">
          <img src="/back/static/illustrations/undraw_secure_login_pdn4.svg" height="300" class="d-block mx-auto" alt="">
        </div>
      </div>
    </div>
  </div>

@endsection