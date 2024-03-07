<?php

namespace App\Queries;

use App\Models\LojaABC\SaleItems;

class GetItems
{
    public static function getData($sales_id): array
    {
        return SaleItems::where(['sales_id' => $sales_id])->get(['product_id','name','price','amount'])->sortBy(['product_id'])->toArray();
    }
}
