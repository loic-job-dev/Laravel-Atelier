<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    public $timestamps = false;
    protected $table = 'customers';

    protected $fillable = ['first_name',
                            'last_name',
                            'email', 
                            'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function adress(): BelongsTo {
        return $this->belongsTo(Adress::class);
    }

    public function orders(): HasMany {
        return $this->hasMany(Order::class);
    }
}
