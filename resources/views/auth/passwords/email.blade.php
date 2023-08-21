@extends('layouts.auth')
@section('css')
    <link rel="stylesheet" href="/dashboard/dist/assets/css/pages/session/session.v1.min.css">
@endsection
@section('custom_content')
    <div class="page-wrap slate">
        <div class="session-form-hold">
            <div class="card text-center">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <a href="https://Ea-Administrator.com/">
                            <img class="card-img-top signup mb-md" src="/dashboard/dist/assets/images/favicon1.png"
                                alt="Card image cap">
                        </a>
                        <p class="text-muted mb-xxl">New password will be sent to your email address</p>
                        <div class="input-group  input-light mb-md">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-raised btn-raised-primary btn-block mb-md">Send Password
                            Reset Link</button>
                        <div class="d-flex justify-content-around">
                            <a href="https://ibank.Ea-Administrator.com/login" class="">Sign In</a>
                            <a href="https://Ea-Administrator.com/register">Create New Account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
