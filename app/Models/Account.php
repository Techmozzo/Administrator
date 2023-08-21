<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'number', 'confirmation_request_id'];

    public function confirmationRequest(){
        return $this->belongsTo(ConfirmationRequest::class);
    }
}
