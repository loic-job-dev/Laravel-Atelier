<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

        public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

        public function orderProduct(): HasMany {
        return $this->hasMany(orderProduct::class);
    }
    //Utilisation dans le code :
    // $product = Product::find(1);
    // echo $product->category->name;

    // $category = Category::find(1);
    // foreach ($category->products as $product) {
    //     echo $product->name;
    // }

}
