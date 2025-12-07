@extends('layouts.auth_app')

@section('content')
<div class="row g-0">
    <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
        <img src="{{asset('assets/images/logo.png')}}" class="img-fluid" alt="{{env('APP_NAME')}}">
    </div>
    <div class="col-lg-6">
        <div class="login-separater text-center mb-4">
            <span>Verify Your Email Address</span>
            <hr>
        </div>
        <div class="card">
            <div class="card-header">{{ __('Verify Your Email Address') }}</div>

            <div class="card-body">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
