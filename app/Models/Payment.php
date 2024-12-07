<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'method',
        'amount',
        'amountusd',
        'address',
        'p_data',
        'state',
        'date',
    ];

    // Define any necessary relationships or methods here
}