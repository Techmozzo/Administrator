@extends('layouts.dashboard')
@section('css')
    <!--<link rel="stylesheet" href="/dashboard/dist/assets/vendors/summernote/summernote-lite.min.css" />-->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('custom_content')
    <!-- Start:: content (Your custom content)-->
    <div class="container mt-lg">
        @include('layouts.message')
        <div class="row">
            <div class="col-lg-12 mb-md">
                <div class="card-header">
                    <h2 class="p-1 m-0 text-16 font-weight-semi">Create Company</h2>
                </div>
                <div class="card">
                    <div class="mt-l mb-lg"></div>
                    <div class="card-body">
                        <div class="mt-l mb-lg"></div>
                        <div class="d-flex justify-content-center col-md-8 offset-md-2">
                            <form action="{{ route('companies.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-sm">
                                        <div class="input-group  input-light mb-3">
                                            <select class="form-select" name="account_id" id="account_id"
                                                style="width:100%;">

                                                <option value="test" selected>
                                                    Test</option>
                                            </select>
                                            @error('account_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-sm">
                                        <div class="input-group  input-light mb-3">
                                            <select class="form-select @error('type') is-invalid @enderror" name="type"
                                                id="type" required>
                                                <option selected disabled>Select Transaction Type *</option>
                                                <option value='credit' {{ old('type') == 'credit' ? 'selected' : '' }}>
                                                    Credit
                                                </option>
                                                <option value='debit' {{ old('type') == 'debit' ? 'selected' : '' }}>
                                                    Debit
                                                </option>
                                            </select>
                                            @error('type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-sm show_transaction">
                                        <div class="input-group  input-light mb-3">
                                            <select class="form-select @error('show_transaction') is-invalid @enderror"
                                                name="show_transaction" id="show_transaction" required>
                                                <option selected disabled>Show Transaction in History *</option>
                                                <option value='NO'
                                                    {{ old('show_transaction') == 'NO' ? 'selected' : '' }}>
                                                    Hide
                                                </option>
                                                <option value='YES'
                                                    {{ old('show_transaction') == 'YES' ? 'selected' : '' }}>
                                                    Show
                                                </option>
                                            </select>
                                            @error('show_transaction')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-sm">
                                        <div class="input-group  input-light mb-3">
                                            <input type="text"
                                                class="form-control amount @error('amount') is-invalid @enderror"
                                                placeholder="Enter Amount *" name="amount" value="{{ old('amount') }}"
                                                required>
                                            @error('amount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-sm">
                                        <div class="input-group  input-light mb-3">
                                            <input type="datetime-local"
                                                class="form-control @error('created_at') is-invalid @enderror"
                                                id="created_at" name="created_at" value="{{ old('created_at') }}"
                                                required />
                                            @error('created_at')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-sm">
                                        <div class="input-group  input-light mb-3">
                                            <textarea name="narration" id="summernote" class="form-control @error('narration') is-invalid @enderror" required>{{ old('narration') }}</textarea>
                                            @error('narration')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-sm">
                                        <div class="input-group input-light mb-3 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Submit
                                            </button>

                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-ban"></i> Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start:: content (Your custom content)-->
@endsection
@section('script')
    <!--<script src="/dashboard/dist/assets/vendors/summernote/summernote-lite.min.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            window.amount = new AutoNumeric.multiple('.amount', {
                decimalPlaces: 2,
                unformatOnSubmit: true,
                modifyValueOnWheel: false,
            });

            $('select[name=account_id]').change(function() {
                $('.balance-div .account').html($(this).find(':selected').attr('data-id'))
            })

            $("#summernote").summernote({
                height: 120
            });
        });
    </script>
@endsection
