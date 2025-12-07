@extends('layouts.auth_app')
@section('title')
    Sign Up
@endsection
@section('content')
<div class="row g-0">
   <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
      <img src="{{asset('assets/images/logo.png')}}" class="img-fluid" alt="{{env('APP_NAME')}}">
   </div>
   <div class="col-lg-6">
      <div class="card-body p-4 p-sm-5">
         <form class="form-body" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="login-separater text-center mb-4">
               <span>SIGN UP WITH EMAIL</span>
               <hr>
            </div>
            <div class="row g-3">
               <div class="col-12">
                  <label for="name" class="form-label">Full Name</label>
                  <div class="ms-auto position-relative">
                     <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-person"></i></div>
                     <input type="text" class="form-control radius-30 ps-5" id="name" @error('name') is-invalid @enderror placeholder="Full Name" name="name" value="{{ old('name') }}" required>
                  
                     @error('name')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
               </div>
               <div class="col-12">
                  <label for="email" class="form-label">Email</label>
                  <div class="ms-auto position-relative">
                     <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-envelope-fill"></i></div>
                     <input type="email" class="form-control radius-30 ps-5" id="email" @error('email') is-invalid @enderror placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  
                     @error('email')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
               </div>
               <div class="col-12">
                  <label for="password" class="form-label">Enter Password</label>
                  <div class="ms-auto position-relative">
                     <div class="position-absolute top-50 translate-middle-y search-icon px-3 @error('password') is-invalid @enderror"><i class="bi bi-lock-fill" id="togglePassword"></i></div>
                     <input type="password" class="form-control radius-30 ps-5" id="password" placeholder="Enter Password" name="password" required autocomplete="current-password">
                  </div>
               </div>
               <div class="col-12">
                  <label for="password_confirmation" class="form-label">Enter Re-Password</label>
                  <div class="ms-auto position-relative">
                     <div class="position-absolute top-50 translate-middle-y search-icon px-3 @error('password_confirmation') is-invalid @enderror"><i class="bi bi-lock-fill" id="togglePassword"></i></div>
                     <input type="password" class="form-control radius-30 ps-5" id="password_confirmation" placeholder="Enter Password" name="password_confirmation" required autocomplete="current-password">
                  </div>
               </div>
               <div class="col-12 text-end"><a href="{{ route('login') }}">Login</a>
               </div>
               <div class="col-12">
                  <div class="d-grid">
                     <button type="submit" class="btn btn-primary radius-30">Sign Up</button>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
