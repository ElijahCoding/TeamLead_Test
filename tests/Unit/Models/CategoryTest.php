<?php

namespace Tests\Unit\Models;

use App\Models\{Category, Product};
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function test_a_category_belongs_to_many_products()
    {
        $category = factory(Category::class)->create();
        $product = factory(Product::class)->create();

        $category->prodcuts()->attach($product);

        $this->assertDatabaseHas('category_product', [
            'category_id' => $category->id,
            'product_id' => $product->id
        ]);
    }

    public function test_a_category_has_many_children()
    {
        $category = factory(Category::class)->create();

        $category->children()->save(
            factory(Category::class)->create()
        );

        $this->assertInstanceOf(Category::class, $category->children()->first());
    }
}
