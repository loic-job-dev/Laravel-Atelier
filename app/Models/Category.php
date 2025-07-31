<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public function products(): hasMany {

        return $this->hasMany(Product:: class);
    }

    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

}
