<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    public $timestamps = false;
    protected $table = 'addresses';

    protected $fillable = ['zip_code', 
                            'city', 
                            'address', 
                            'customer_id'];

        public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
