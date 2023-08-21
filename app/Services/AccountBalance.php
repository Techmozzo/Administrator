<?php

namespace App\Services;

use App\Models\Account;

class AccountBalance
{
    public static function validateBalance(Account $account, string $amount): bool
    {
        if ($account->balance < $amount) {
            return false;
        }
        return true;
    }

    // balanceType could be a string or array
    public static function calculate(Account $account, string $amount, $balanceType, bool $credit = false): array
    {
        $balance = [];
        if (is_array($balanceType)) {
            foreach ($balanceType as $type) {
                if ($credit) {
                    $newBalance =  $account->$type + $amount;
                } else {
                    $newBalance =  $account->$type - $amount;
                }
                $balance[$type] =  $newBalance;
            }
        } else {
            if ($credit) {
                $newBalance =  $account->$balanceType +  $amount;
            } else {
                $newBalance =  $account->$balanceType -  $amount;
            }
            $balance[$balanceType] = $newBalance;
        }
        return $balance;
    }


    public static function update(Object $transaction, ?Object $request = null)
    {
        $account = $transaction->account;
        $balance = [];

        if (!isset($request->status)) {
            $balance = self::calculate($account, $transaction->amount, 'balance');
        } else {
            if (($transaction->status < $request->status) && ($transaction->status + $request->status == 1)) {
                //takes care of pending to confirmed
                $balance = self::calculate($account, $transaction->amount, 'book_balance');
            } elseif (($transaction->status > $request->status) && ($transaction->status + $request->status == 1)) {
                //takes care of confirmed to pending
                $balance = self::calculate($account, $transaction->amount, 'book_balance', true);
            } elseif (($request->status > 1)) {
                if ($transaction->status == 0) {
                    $balance = self::calculate($account, $transaction->amount, ['balance'], true);
                } elseif ($transaction->status == 1) {
                    $balance = self::calculate($account, $transaction->amount, ['balance', 'book_balance'], true);
                }
            }
        }
        $account->update($balance);
    }

    public function calculateDispenseError(Account $account, int $amount, string $action): array
    {
        if ($action == 'increment') {
            $newBalance = $account->balance + $amount;
            $newBookBalance = $account->book_balance + $amount;
        } else {
            $newBalance = $account->balance - $amount;
            $newBookBalance = $account->book_balance - $amount;
        }
        return ['balance' => $newBalance, 'book_balance' => $newBookBalance];
    }
}
