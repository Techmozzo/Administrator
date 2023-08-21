@extends('layouts.dashboard')
@section('css')
    <link rel="stylesheet" href="/dashboard/dist/assets/vendors/summernote/summernote-lite.min.css" />
@endsection
@section('custom_content')
    <!-- Start:: content (Your custom content)-->
    <div class="container my-lg d-flex flex-column">
        <div class="card-header d-flex jusitify-space-between">
            <h2 class="p-1 m-0 text-16 font-weight-semi">Edit {{ $company->name }}</h2>
            <div class="flex-grow-1"></div>
            <div>
                <a type="button" class="btn btn-opacity btn-primary btn-sm my-sm mr-sm" href="{{route('companies.index')}}"
                    title="Back">Back</a>
            </div>
        </div>
        <div class="doc-example d-flex justify-content-center">
            <div class="col-lg-8">
                @include('layouts.message')
                <div class="clearfix">&nbsp;</div>
                <form action="{{ url('/companies/' . encrypt($company->id)) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label class="control-label" for="name">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            value="{{ $company->name }}" />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="email">Email Address</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ $company->email }}" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="email">Web Address</label>
                        <input type="text" class="form-control @error('website') is-invalid @enderror" id="website"
                            name="website" value="{{ $company->website }}" />
                        @error('website')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="email">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone" value="{{ $company->phone }}" />
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="administrator">Administrator</label>
                        <select class="form-control @error('administrator') is-invalid @enderror" name="administrator_id"
                            id="administrator_id">
                            @foreach ($administrators as $administrator)
                                <option value="{{ $administrator->id }}"
                                    @php echo ($company->administrator_id == $administrator->id)? 'selected':''; @endphp>
                                    {{ $administrator->name() }}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="address">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                            name="address" value="{{ $company->address }}" />
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="city">City</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city"
                            name="city" value="{{ $company->city }}" />
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="state">State</label>
                        <input type="text" class="form-control @error('state') is-invalid @enderror" id="state"
                            name="state" value="{{ $company->state }}" />
                        @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="country">Country</label>
                        <input type="text" class="form-control @error('country') is-invalid @enderror" id="country"
                            name="country" value="{{ $company->country }}" />
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="zip">Zip Code</label>
                        <input type="text" class="form-control @error('zip') is-invalid @enderror" id="zip"
                            name="zip" value="{{ $company->zip }}" />
                        @error('zip')
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
            Company will be recorded and reflected on user dashboard.
        </div>
    </div>
@endsection

@section('script')
    <script src="/dashboard/dist/assets/vendors/summernote/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#summernote").summernote({
                height: 120
            });
        });
    </script>
@endsection
