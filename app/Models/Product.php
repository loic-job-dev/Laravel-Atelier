<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = [
        'name',
        'description',
        'price_small',
        'price_large',
        'quantity_stock',
        'category_id',
        'head_notes',
        'heart_notes',
        'deep_notes',
        'intensity',
        'track',
        'history',
        'ingredients',
    ];


     public $timestamps = false; 
}

