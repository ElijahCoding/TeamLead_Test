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

        }
    }

    protected function createProduct()
    {
        
    }

    protected function createCategory($product)
    {

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
