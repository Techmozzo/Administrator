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
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <a href="https://Ea-Administrator.com/">
                            <img class="card-img-top signup mb-md" src="/dashboard/dist/assets/images/favicon1.png"
                                alt="Card image cap">
                        </a>
                        <p class="text-muted mb-xxl">Reset Password</p>
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                    placeholder="E-Mail Address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirm Password">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-raised btn-raised-primary btn-block mb-md">Reset
                            Password</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
