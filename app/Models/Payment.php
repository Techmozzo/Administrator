<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id','account_id','entry','type','amount','status','method_of_payment','reference_number','sender','receiver','sender_account_number',
        'receiver_account_number','receiver_bank','recipient_mobile','narrative','remark','receiver_address','routing_number','iban_number','receiver_bank_sort_code',
        'currency', 'equivalent_amount', 'created_at', 'show', 'receiver_bank_address'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function account(){
        return $this->belongsTo(Account::class, 'account_id');
    }
}
