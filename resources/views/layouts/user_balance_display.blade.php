@if ($accounts->count() > 0)
    <div class="d-flex justify-content-center balance-div">
        @if (!empty(old('account_id')))
            <?php
            $acct = \App\Models\Account::find(old('account_id'));
            ?>
            <h4>Account Balance {{ $acct->currency->symbol }}@format_amount($acct->balance)</h4>
        @else
            @foreach ($accounts as $account)
                @if ($loop->first)
                    <h4>Account Balance
                        <span class="account">{{ $account->currency->symbol }}@format_amount($account->balance)</span>
                    </h4>
                @endif
            @endforeach
        @endif
    </div>
@endif
