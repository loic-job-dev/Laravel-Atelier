<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = [
        'name',
        'description',
        'price_small' =>'required|integer|min:0',
        'price_large' =>'required|integer|min:0',
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

     Public function Category () {

        return $this->belongsTo(Category ::class);
     }
    
}

