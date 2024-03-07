<?php

namespace App\Queries;

use App\Models\LojaABC\Products;

class GetProducts
{
    public static function getData(): array
    {
        return Products::all(['name','price','description'])->sortBy(['name','product_id'])->toArray();

    }
}
