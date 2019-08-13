<?php

use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use App\Models\{Category, Product, Offer};

class CategorySeeder extends Seeder
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = $this->fetchApi();

        foreach ($products as $product) {
            $this->createCategory($product);
            $this->createProduct($product);
            // $this->createOffer($product);
        }
    }

    protected function createProduct($product)
    {
        Product::create([
            'title' => $product->title,
            'image' => $product->image,
            'description' => $product->description,
            'first_invoice' => $product->first_invoice,
            'url' => $product->url,
            'price' => $product->price,
            'amount' => $product->amount
        ]);
    }

    protected function createCategory($product)
    {
        $category_ids = Category::get()->pluck('id')->toArray();

        if (count($product->categories)) {
            foreach ($product->categories as $category) {
                if (!in_array($category->id, $category_ids)) {
                    Category::create([
                        'id' => $category->id,
                        'title' => $category->title,
                        'alias' => $category->alias,
                        'parent_id' => $category->parent
                    ]);
                }
            }
        }
    }

    protected function createOffer($product)
    {

    }

    protected function fetchApi()
    {
        $link = 'https://markethot.ru/export/bestsp';

        $response = $this->client->request('GET', $link);

        if (json_decode($response->getBody()) === null) {
            return null;
        } else {
            return json_decode($response->getBody())->products;
        }
    }
}
