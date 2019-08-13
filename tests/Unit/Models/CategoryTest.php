<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function test_a_category_belongs_to_many_products()
    {
        $category = factory('App\Models\Category')->create();
        $product = factory('App\Models\Product')->create();

        $category->prodcuts()->attach($product);

        $this->assertDatabaseHas('category_product', [
            'category_id' => $category->id,
            'product_id' => $product->id
        ]);
    }
}
