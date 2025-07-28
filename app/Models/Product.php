<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public $timestamps = false;
    protected $table = 'products';

    protected $fillable = ['name', 
                            'price_large', 
                            'price_small', 
                            'description', 
                            'quantity_stock', 
                            'category_id', 
                            'head_notes', 
                            'heart_notes', 
                            'deep_notes', 
                            'intensity', 
                            'track', 
                            'history', 
                            'ingredients'];
}
