<!DOCTYPE html>
<html>

<head>
    <base href="" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="/template/assets/img/main/logo.svg">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,500;0,600;0,700;1,400&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />

    {{-- Remove in terms of times of style  conflict --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="/dashboard/dist/assets/css/vendors.bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.9.1/styles/github.min.css" />
    <link rel="stylesheet" href="/dashboard/dist/assets/css/main.bundle.min.css" />
    <link rel="stylesheet" href="/dashboard/dist/assets/css/custom.css" />
    @yield('css')
</head>

<body class="windows desktop pace-done" data-gr-c-s-loaded="true">

    <nav class="container row justify-content-between mt-3">
        <div class="col-12 col-md mt-1" style="text-align: center;">
            <h2 class="page-title label-primary no-padding">
                Instant Account Opening
            </h2>
        </div>
        <div class="col text-md-right mt-1">
            <span class="" style="float: right;">
                <a href="/">
                    <img id="logoId" src="/template/assets/img/main/logo.svg" height="60" style="">
                </a>
            </span>
        </div>
    </nav>
    <!-- Start:: content body-->
    <div class="main-content-body">
        <div class="container my-lg d-flex flex-column">
            <div class="doc-section-title d-flex justify-content-center">
                <h2 class="doc-section-title">Join Ea-Administrator Today...</h2>
            </div>
            <div class="doc-example d-flex justify-content-center">
                <div class="col-lg-12">
                    @include('layouts.message')
                    {{-- <div class="clearfix">&nbsp;</div> --}}
                    <form method="post" action="https://Ea-Administrator.com/register" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header text-center">
                            <img src="/template/assets/img/picture-default.png" width="100" height="100" />
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row clearfix">
                                    <div class="form-group col-sm-6">
                                        <select class="form-select @error('title') is-invalid @enderror" name="title">
                                            <option selected disabled>Select Title *</option>
                                            <option value="Mr." {{ old('title') == 'Mr.' ? 'selected' : '' }}>Mr.
                                            </option>
                                            <option value="Mrs." {{ old('title') == 'Mrs.' ? 'selected' : '' }}>Mrs.
                                            </option>
                                            <option value="Miss" {{ old('title') == 'Miss' ? 'selected' : '' }}>Miss
                                            </option>
                                            <option value="Mister" {{ old('title') == 'Mister' ? 'selected' : '' }}>
                                                Mister</option>
                                            <option value="Dr." {{ old('title') == 'Dr.' ? 'selected' : '' }}>Dr.
                                            </option>
                                            <option value="Prof" {{ old('title') == 'Prof.' ? 'selected' : '' }}>Prof.
                                            </option>
                                            <option value="others" {{ old('title') == 'others' ? 'selected' : '' }}>
                                                Others</option>
                                        </select>
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <select class="form-select @error('gender') is-invalid @enderror"
                                            name="gender">
                                            <option selected disabled>Select Gender *</option>
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                                                Female</option>
                                            <option value="others" {{ old('gender') == 'others' ? 'selected' : '' }}>
                                                Others</option>
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="form-group col-sm-6">
                                        <div class="input-group  input-light mb-3">
                                            <input type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                placeholder="First Name *" name="first_name"
                                                value="{{ old('first_name') }}" required>
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="input-group  input-light mb-3">
                                            <input type="text"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                placeholder="Last Name *" name="last_name"
                                                value="{{ old('last_name') }}" required>
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="form-group col-sm-6">
                                        <div class="input-group  input-light mb-3">
                                            <input type="text"
                                                class="form-control @error('middle_name') is-invalid @enderror"
                                                placeholder="Middle Name *" name="middle_name"
                                                value="{{ old('middle_name') }}">
                                            @error('middle_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class=" form-group col-sm-6">
                                        <select class="form-select @error('marital_status') is-invalid @enderror"
                                            name="marital_status">
                                            <option selected disabled>Select Marital Status *</option>
                                            <option value="single"
                                                {{ old('marital_status') == 'single' ? 'selected' : '' }}>Single
                                            </option>
                                            <option value="married"
                                                {{ old('marital_status') == 'married' ? 'selected' : '' }}>Married
                                            </option>
                                            <option value="divorced"
                                                {{ old('marital_status') == 'Divorced' ? 'selected' : '' }}>Divorced
                                            </option>
                                            <option value="others"
                                                {{ old('marital_status') == 'others' ? 'selected' : '' }}>Others
                                            </option>
                                        </select>
                                        @error('marital_status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="form-group col-sm-6">
                                        <div class="input-group  input-light mb-3">
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email Address *" name="email"
                                                value="{{ old('email') }}" required>
                                            <div class="input-group-addon">
                                                <i class="fa fa-envelop"></i>
                                            </div>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <div class="input-group  input-light mb-3">
                                            <input type="text"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="Phone Number *" name="phone"
                                                value="{{ old('phone') }}" required>
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="form-group col-sm-6">
                                        <div class="input-group  input-light mb-3">
                                            <input type="text"
                                                class="form-control @error('date_of_birth') is-invalid @enderror"
                                                placeholder="Date of Birth *" name="date_of_birth"
                                                value="{{ old('date_of_birth') }}" onfocus="(this.type='date')"
                                                required>
                                            @error('date_of_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <div class="form-input-group">
                                            <select name="country_of_origin"
                                                class="form-select @error('country_of_origin') 'is-invalid' @enderror"
                                                required>
                                                <option selected disabled>Country of Origin *</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->name }}"
                                                        {{ $country->name == old('country_of_origin') ? 'selected' : '' }}>
                                                        {{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('country_of_origin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-input-group">
                                    <div class="input-group  input-light mb-3">
                                        <input type="text"
                                            class="form-control @error('occupation') is-invalid @enderror"
                                            placeholder="Occuption *" name="occupation"
                                            value="{{ old('occupation') }}" required>
                                        @error('occupation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row clearfix">
                                    <div class="form-group col-sm-12">
                                        <select name="account_type"
                                            class="form-select @error('account_type') 'is-invalid' @enderror"
                                            required>
                                            <option selected disabled>Account Type *</option>
                                            @foreach ($accountTypes as $type)
                                                <option value="{{ $type->id }}"
                                                    {{ $type->id == old('account_type') ? 'selected' : '' }}>
                                                    {{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('account_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="form-group col-sm-12">
                                        <select name="currency"
                                            class="form-select @error('currency') 'is-invalid' @enderror" required>
                                            <option selected disabled>Select Currency *</option>
                                            @foreach ($currencies as $currency)
                                                <option value="{{ $currency->id }}"
                                                    {{ $currency->id == old('currency') ? 'selected' : '' }}>
                                                    {{ $currency->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('currency')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row clearfix" style="margin-bottom: 17px; margin-top: 16px;">
                                    <div class="form-group col-sm-12">
                                        <select name="country_of_residence"
                                            class="form-select @error('country_of_residence') 'is-invalid' @enderror"
                                            required>
                                            <option selected disabled>Country of Residence *</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->name }}"
                                                    {{ $country->name == old('country_of_residence') ? 'selected' : '' }}>
                                                    {{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('country_of_residence')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="form-input-group col-sm-6">
                                        <div class="input-group  input-light mb-3">
                                            <input type="text"
                                                class="form-control @error('state_of_residence') is-invalid @enderror"
                                                placeholder="State of Residence *" name="state_of_residence"
                                                value="{{ old('state_of_residence') }}" required>
                                            <div class="input-group-addon">
                                                <i class="fa fa-map"></i>
                                            </div>
                                            @error('state_of_residence')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <div class="input-group  input-light mb-3">
                                            <input type="text"
                                                class="form-control @error('city') is-invalid @enderror"
                                                placeholder="City *" name="city" value="{{ old('city') }}"
                                                required>
                                            <div class="input-group-addon">
                                                <i class="fa fa-city"></i>
                                            </div>
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="form-group col-sm-12">
                                        <div class="input-group  input-light mb-3">
                                            <input type="text"
                                                class="form-control @error('address') is-invalid @enderror"
                                                placeholder="House Address *" name="address"
                                                value="{{ old('address') }}" required>
                                            <div class="input-group-addon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="form-input-group">
                                        <input type="file"
                                            class="form-control @error('attachment') is-invalid @enderror"
                                            name="attachment">
                                        @error('attachment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <p>Upload a valid means of identification not more than 2MB</p>
                                    </div>
                                </div>

                                <div class="checkbox check-danger checkbox-circle">
                                    <input type="checkbox" name="indemnity_agree"
                                        class="@error('indemnity_agree') is-invalid @enderror"
                                        {{ old('indemnity_agree') ? 'checked' : '' }} required />
                                    <label for="agreetoterms">I agree to <a href="/Content/NRN Indemnity Form_PDF.pdf"
                                            target="_blank">Indemnity and T&Cs</a></label>
                                    @error('indemnity_agree')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div>
                                    <button type="submit"
                                        class="form-control btn btn-opacity btn-primary btn-sm my-sm mr-sm"> Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Start:: Footer-->
    <div class="flex-grow-1"></div>
    <div class="bg-card px-lg py-md d-flex justify-content-center align-items-center flex-wrap shadow-6dp">
        <p class="text-muted m-0">
            <span class="hint-text">Copyright &copy; {{ \Carbon\Carbon::now()->year }} </span>
            <span class="hint-text">All rights reserved. </span>
            <span class="sm-block"><a href="{{ route('terms') }}" class="m-l-10 m-r-10">Terms of use</a> <span
                    class="muted">|</span> <a href="{{ route('privacy-policy') }}" class="m-l-10">Privacy
                    Policy</a></span>

        </p>
    </div>
    <!-- End:: Footer-->
</body>

</html>
