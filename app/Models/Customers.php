<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'currency',
        'website',
        'notes',
        'bank_name',
        'bank_branch',
        'bank_account_holder',
        'bank_account_number',
        'bank_ifsc',
        'profile_image'
    ];
}
