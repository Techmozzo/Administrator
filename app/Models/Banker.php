<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banker extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'password', 'must_change_password', 'bank_id', 'is_verified', 'is_blocked'];

    public function  bank(){
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function name(){
        return $this->profile->first_name.' '. $this->profile->last_name;
    }

    public function profile(){
        return $this->hasOne(BankerProfile::class, 'banker_id');
    }
}
