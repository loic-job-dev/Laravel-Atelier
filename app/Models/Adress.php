<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Adress extends Model
{
    public $timestamps = false;
    protected $table = 'adresses';

    protected $fillable = ['zip_code', 
                            'city', 
                            'address', 
                            'description', 
                            'customer_id'];

        public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
