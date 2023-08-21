@extends('layouts.auth')
@section('css')
    <link rel="stylesheet" href="/dashboard/dist/assets/css/pages/session/session.v1.min.css">
@endsection
@section('custom_content')
    <div class="page-wrap slate">
        <div class="session-form-hold">
            <div class="card text-center">
                <div class="card-body">
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <a href="https://Ea-Administrator.com/">
                            <img class="card-img-top signup mb-md" src="/dashboard/dist/assets/images/favicon1.png"
                                alt="Card image cap">
                        </a>
                        <p class="text-muted mb-xxl">Please confirm your password before continuing.</p>
                        <div class="input-group  input-light mb-md">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-raised btn-raised-primary btn-block mb-md">Confirm
                            Password</button>
                        <div class="d-flex justify-content-around">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
