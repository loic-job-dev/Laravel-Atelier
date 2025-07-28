<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderProduct extends Model
{
    public $timestamps = false;

    protected $table = 'order_products';

    protected $fillable = ['order_id',
                            'product_id',
                            'quantity'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function products(): HasMany {
        return $this->hasMany(Product::class);
    }

}

