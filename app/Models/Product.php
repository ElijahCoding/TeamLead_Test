<?php

namespace App\Models;

use App\Models\{Category, Offer};
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }
}
