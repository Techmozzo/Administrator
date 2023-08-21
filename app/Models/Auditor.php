<?php

namespace App\Models;

use App\Interfaces\Types;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditor extends Model
{
    use HasFactory;

    public function name(){
        return $this->profile->first_name.' '. $this->profile->last_name;
    }

    public function profile(){
        return $this->hasOne(Profile::class, 'user_id')->where('user_type', Types::Users['auditor']);
    }

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }
}
