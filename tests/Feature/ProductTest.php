<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductTest extends TestCase
{

    public function testListProducts()
    {
        $token = '1|paMzAxjE2uOUJPYquJuvjPttQ2EeBZFheAxZLJZE6ac69a50';

        $this->json('GET', 'api/products', [], ['Accept' => 'application/json',
            'Authorization' =>'Bearer '.$token])
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    [
                    'name',
                    'price',
                    'description'
                    ],
                ]
            );
    }

}
