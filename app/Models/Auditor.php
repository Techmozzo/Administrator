<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditor extends Model
{
    use HasFactory;

    public function name(){
        return $this->profile->first_name.' '. $this->profile->last_name;
    }

    public function profile(){
        return $this->hasOne(AuditorProfile::class, 'auditor_id');
    }

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }
}
