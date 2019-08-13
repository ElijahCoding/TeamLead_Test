<?php

use GuzzleHttp\Client;
use Illuminate\Database\Seeder;

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

        foreach ($data as $item) {
            
        }
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
