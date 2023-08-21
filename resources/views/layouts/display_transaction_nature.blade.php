<div class="row foreign-transfer" style="display: none;">

    <h2 class="p-1 m-0 text-16 font-weight-semi text-center">Foreign Transfer</h2>
    <div class="mt-l mb-lg"></div>

    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <select class="form-select" name="account_id" id="account_id" style="width:100%;">
                @foreach ($accounts as $account)
                    <option value="{{ $account->id }}" {{ old('account_id') == $account->id ? 'selected' : '' }}
                        data-id={{ $account->currency->symbol }}@format_amount($account->balance) data-shorthand={{ $account->currency->shorthand }}>
                        {{ $account->number }}</option> @endforeach
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
            <select class="form-select" name="currency" style="width:100%;">
                <option selected disabled>Select Currency *</option>
                @foreach ($currencies as $currency)
                    <option value="{{ $currency->name }}" {{ old('currency') == $currency->name ? 'selected' : '' }}>
                        {{ $currency->country }} - {{ $currency->name }}</option>
                @endforeach
            </select>
            @error('currency')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <input type="text" class="form-control amount @error('equivalent_amount') is-invalid @enderror"
                placeholder="Amount *" name="equivalent_amount" value="{{ old('equivalent_amount') }}"  >
            @error('equivalent_amount')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <input type="text" class="form-control amount @error('amount') is-invalid @enderror"
                placeholder="Enter Equivalent Amount in Account Currency *" name="amount" value="{{ old('amount') }}"
                 >
            @error('amount')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    {{-- <div class="border-bottom mt-xxl mb-lg"></div> --}}

    <h2 class="p-1 m-0 text-16 font-weight-semi text-center">Beneficiary Details</h2>

    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <input type="text" class="form-control @error('receiver') is-invalid @enderror"
                placeholder="Beneficiary Account Name *" name="receiver" value="{{ old('receiver') }}"  
                autocomplete="receiver">
            @error('receiver')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <input type="text" class="form-control @error('receiver_account_number') is-invalid @enderror"
                placeholder="Beneficiary Account Number *" name="receiver_account_number"
                value="{{ old('receiver_account_number') }}"   autocomplete="receiver_account_number">
            @error('receiver_account_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <input type="text" class="form-control @error('receiver_bank') is-invalid @enderror"
                placeholder="Beneficiary Bank *" name="receiver_bank" value="{{ old('receiver_bank') }}"
                autocomplete="receiver_bank">
            @error('receiver_bank')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <input type="text" class="form-control @error('receiver_address') is-invalid @enderror"
                placeholder="Beneficiary House Address *" name="receiver_address" value="{{ old('receiver_address') }}"
                  autocomplete="receiver_address">
            @error('receiver_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <input type="text" class="form-control @error('routing_number') is-invalid @enderror"
                placeholder="BIC/Routing Number" name="routing_number" value="{{ old('routing_number') }}">
            @error('routing_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <input type="text" class="form-control @error('iban_number') is-invalid @enderror"
                placeholder="IBAN Number/BIC(Mandatory for Euro transfers)" name="iban_number"
                value="{{ old('iban_number') }}">
            @error('iban_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <input type="text" class="form-control @error('receiver_bank_sort_code') is-invalid @enderror"
                placeholder="Sort Code *" name="receiver_bank_sort_code" value="{{ old('receiver_bank_sort_code') }}"
                 >
            @error('receiver_bank_sort_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <input type="text" class="form-control @error('remark') is-invalid @enderror"
                placeholder="Remark (Optional)" name="remark" value="{{ old('remark') }}" autocomplete="remark">
            @error('remark')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>



<div class="row internal-transfer" style="display: none;">

    <h2 class="p-1 m-0 text-16 font-weight-semi text-center">Internal Transfer</h2>
    <div class="mt-l mb-lg"></div>

    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <select class="form-select" name="account_id" id="account_id" style="width:100%;">
                @foreach ($accounts as $account)
                    <option value="{{ $account->id }}"
                        data-id={{ $account->currency->symbol }}@format_amount($account->balance) data-shorthand={{ $account->currency->shorthand }}>{{ $account->number }}</option> @endforeach
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
            <input type="text" class="form-control @error('receiver_account_number') is-invalid @enderror"
                placeholder="Beneficiary Account Number *" name="receiver_account_number"
                value="{{ old('receiver_account_number') }}"   autocomplete="receiver_account_number">
            @error('receiver_account_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <input type="text" class="form-control @error('receiver') is-invalid @enderror"
                placeholder="Beneficiary Account Name *" name="receiver" value="{{ old('receiver') }}"
                autocomplete="receiver">
            @error('receiver')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <input type="text" class="form-control amount @error('amount') is-invalid @enderror"
                placeholder="Amount *" name="amount" value="{{ old('amount') }}"   autocomplete="amount">
            @error('amount')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <input type="text" class="form-control @error('remark') is-invalid @enderror"
                placeholder="Remark (Optional)" name="remark" value="{{ old('remark') }}" autocomplete="remark">
            @error('remark')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>



<div class="row other-transfer" style="display: none;">

    <h2 class="p-1 m-0 text-16 font-weight-semi text-center">Other Transfer</h2>
    <div class="mt-l mb-lg"></div>

    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <select class="form-select" name="account_id" id="account_id" style="width:100%;">
                @foreach ($accounts as $account)
                    <option value="{{ $account->id }}"
                        data-id={{ $account->currency->symbol }}@format_amount($account->balance) data-shorthand={{ $account->currency->shorthand }}>{{ $account->number }}</option> @endforeach
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
            <input type="text" class="form-control @error('receiver_account_number') is-invalid @enderror"
                placeholder="Beneficiary Account Number *" name="receiver_account_number"
                value="{{ old('receiver_account_number') }}"   autocomplete="receiver_account_number">
            @error('receiver_account_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <input type="text" class="form-control @error('receiver') is-invalid @enderror"
                placeholder="Beneficiary Account Name *" name="receiver" value="{{ old('receiver') }}"
                autocomplete="receiver">
            @error('receiver')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <select class="form-select" name="receiver_bank" style="width:100%;">
                <option selected disabled>Select Beneficiary Bank *</option>
                @foreach ($banks as $bank)
                    <option value="{{ $bank->name }}" {{ old('receiver_bank') == $bank->name ? 'selected' : '' }}>
                        {{ $bank->name }}</option>
                @endforeach
            </select>
            @error('receiver_bank')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <input type="text" class="form-control amount @error('amount') is-invalid @enderror"
                placeholder="Amount *" name="amount" value="{{ old('amount') }}"   autocomplete="amount">
            @error('amount')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-sm">
        <div class="input-group  input-light mb-3">
            <input type="text" class="form-control @error('remark') is-invalid @enderror"
                placeholder="Remark (Optional)" name="remark" value="{{ old('remark') }}" autocomplete="remark">
            @error('remark')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
