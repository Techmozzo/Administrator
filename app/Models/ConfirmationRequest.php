<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmationRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','opening_period','closing_period','auditor_id','company_id','bank_id', 'authorization_status', 'confirmation_status'
    ];

    public function banker(){
        return $this->belongsTo(Banker::class, 'banker_id');
    }

    public function auditor(){
        return $this->belongsTo(Auditor::class, 'auditor_id');
    }
}
