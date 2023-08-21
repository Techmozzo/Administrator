@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@extends('layouts.auth')
@section('css')
    <link rel="stylesheet" href="/dashboard/dist/assets/css/pages/session/session.v1.min.css">
@endsection
@section('custom_content')
    <div class="page-wrap slate">
        <div class="session-form-hold">
            <div class="card text-center">
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            A fresh verification link has been sent to your email address.
                        </div>
                    @endif
                    <p>Before proceeding, please check your email for a verification link.</p>
                    <p>If you did not receive the email</p>
                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <a href="https://Ea-Administrator.com/">
                            <img class="card-img-top signup mb-md" src="/dashboard/dist/assets/images/favicon2.png"
                                alt="Card image cap">
                        </a>
                        <p class="text-muted mb-xxl">Verify Your Email Address</p>
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request
                            another</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
