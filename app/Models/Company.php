<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name','website', 'company_code', 'logo', 'address', 'city', 'state', 'country', 'zip', 'is_verified', 'administrator_id'];

    public function administrator(){
        return $this->belongsTo(Auditor::class, 'administrator_id');
    }

}
