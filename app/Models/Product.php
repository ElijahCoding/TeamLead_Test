<?php

namespace App\Models;

use DB;
use App\Models\{Category, Offer};
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public static function getTopProducts()
    {
        return DB::select("
                            SELECT p.id, p.title, sum(o.sales) as sales
                                FROM products as p
                            LEFT JOIN offers as o
                                ON p.id = o.product_id
                            GROUP BY p.id, p.title
                            ORDER BY sum(o.sales) desc
                                LIMIT 20
        ");
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }
}
