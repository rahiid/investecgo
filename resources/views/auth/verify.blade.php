@extends('layouts.app')

@section('assets')
    <link rel="stylesheet" href="css/auth.css">
@endsection

@section('content')

<section class="verify-section" style=" width: 100%; min-height: 100vh;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card verify-inner" style="margin-top: 50px;">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body verify-form">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button style="color: #3361FF;" type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</section>

@endsection
