<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    public $timestamps = false;

    protected $table = 'orders';

    protected $fillable = ['date_hour',
                            'shipping_cost',
                            'total', 
                            'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderProduct(): HasMany {
        return $this->hasMany(OrderProduct::class);
    }
    
}