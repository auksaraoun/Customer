<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    protected $dateFormat = 'Y-m-d';

    protected $fillable = [
        'firstname', 'lastname', 'email', 'phone'
    ];
}
