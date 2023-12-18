<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'address',
        'country',
        'city',
        'pincode',
        'state',
        'similar'
    ];
}