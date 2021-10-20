<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'foodname',
        'quantity_id',
        'price',
        'name',
        'phone',
        'address',
    ];
}
