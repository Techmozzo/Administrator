<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankerAddress extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['house_number', 'city', 'state', 'country', 'zip_code', 'banker_id'];
}
