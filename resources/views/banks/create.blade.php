@extends('layouts.dashboard')
@section('css')
    <link rel="stylesheet" href="/dashboard/dist/assets/vendors/summernote/summernote-lite.min.css" />
@endsection
@section('custom_content')
    <!-- Start:: content (Your custom content)-->
    <div class="container my-lg d-flex flex-column">
        <div class="card-header d-flex jusitify-space-between">
            <h2 class="p-1 m-0 text-16 font-weight-semi">Add Bank</h2>
            <div class="flex-grow-1"></div>
            <div>
                <a type="button" class="btn btn-opacity btn-primary btn-sm my-sm mr-sm" href="{{ route('banks.index') }}"
                    title="Back">Back</a>
            </div>
        </div>
        <div class="doc-example d-flex justify-content-center">
            <div class="col-lg-8">
                @include('layouts.message')
                <div class="clearfix">&nbsp;</div>
                <form action="{{ route('banks.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="control-label" for="name">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="email">Email Address</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{old('email')}}" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="email">Web Address</label>
                        <input type="text" class="form-control @error('website') is-invalid @enderror" id="website"
                            name="website" value="{{old('website')}}" />
                        @error('website')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="email">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone" value="{{old('phone')}}" />
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mt-xxl mb-lg"></div>

                    <h2 class="p-1 m-0 text-16 font-weight-semi text-center">Administrator Information</h2>

                        <div class="form-group">
                            <label class="control-label" for="administrator_first_name">First Name</label>
                            <input class="form-control @error('administrator_first_name') is-invalid @enderror" id="administrator_first_name" name="administrator_first_name" value="{{old('administrator_first_name')}}" />
                            @error('administrator_first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="administrator_last_name">Last Name</label>
                            <input class="form-control @error('administrator_last_name') is-invalid @enderror" id="administrator_last_name" name="administrator_last_name" value="{{old('administrator_last_name')}}" />
                            @error('administrator_last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="administrator_email">Email Address</label>
                            <input class="form-control @error('administrator_email') is-invalid @enderror" id="administrator_email" name="administrator_email" value="{{old('administrator_email')}}" />
                            @error('administrator_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="administrator_phone">Phone</label>
                            <input class="form-control @error('administrator_phone') is-invalid @enderror" id="administrator_phone" name="administrator_phone" value="{{old('administrator_phone')}}" />
                            @error('administrator_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    <div class="form-group col-lg-6" style="margin:auto;">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-footer">
            Bank will be recorded and reflected on user dashboard.
        </div>
    </div>
@endsection
