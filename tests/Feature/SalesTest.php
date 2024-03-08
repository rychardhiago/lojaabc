<?php

namespace Tests\Feature;

use Tests\TestCase;

class SalesTest extends TestCase
{

    public function testListSales()
    {
        $token = '1|paMzAxjE2uOUJPYquJuvjPttQ2EeBZFheAxZLJZE6ac69a50';

        $this->json('GET', 'api/sales', [], ['Accept' => 'application/json',
            'Authorization' =>'Bearer '.$token])
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    [
                    'sales_id',
                    'amount',
                    'products' => []
                    ],
                ]
            );
    }

    public function testGetEspecificSale()
    {
        $token = '1|paMzAxjE2uOUJPYquJuvjPttQ2EeBZFheAxZLJZE6ac69a50';

        $this->json('GET', 'api/sales/202301011', [], ['Accept' => 'application/json',
            'Authorization' =>'Bearer '.$token])
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    'sales_id',
                    'amount',
                    'products' => [
                        [
                            'product_id',
                            'name',
                            'price',
                            'amount'
                        ]
                    ]
                ]
            );
    }

    public function testCancelSale()
    {
        $token = '1|paMzAxjE2uOUJPYquJuvjPttQ2EeBZFheAxZLJZE6ac69a50';

        $this->json('GET', 'api/cancelSale/202301011', [], ['Accept' => 'application/json',
            'Authorization' =>'Bearer '.$token])
            ->assertStatus(200)
            ->assertJson([
                'message' => ['Order#202301011 has been canceled.'],
            ]);
    }

    public function testCreateSales()
    {
        $token = '1|paMzAxjE2uOUJPYquJuvjPttQ2EeBZFheAxZLJZE6ac69a50';


        $sales = [
            [
                "sales_id" => "887970",
                "amount" => 9800,
                "products" => [
                    [
                        "product_id" => 3,
                        "name" => "Celular 3",
                        "price" => 9800,
                        "amount" => 1
                    ]
                ]
            ]
        ];


        $this->json('POST', 'api/sales', $sales, ['Accept' => 'application/json',
            'Authorization' =>'Bearer '.$token])
            ->assertStatus(201);
    }

    public function testAddProductToSale()
    {
        $token = '1|paMzAxjE2uOUJPYquJuvjPttQ2EeBZFheAxZLJZE6ac69a50';


        $sales = [
            [
                "sales_id" => "88797",
                "products" => [
                    [
                        "product_id" => 3,
                        "name" => "Celular 3",
                        "price" => 9800,
                        "amount" => 1
                    ]
                ]
            ]
        ];


        $this->json('POST', 'api/addProductToSale', $sales, ['Accept' => 'application/json',
            'Authorization' =>'Bearer '.$token])
            ->assertStatus(201);
    }

}
