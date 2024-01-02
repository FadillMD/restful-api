<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sopr extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_sopr',
        'no_po',
        'customer',
        'order_date',
        'timestamp',
    ];
}
