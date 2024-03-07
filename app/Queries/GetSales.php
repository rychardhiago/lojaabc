<?php

namespace App\Queries;

use App\Models\LojaABC\Sales;

class GetSales
{
    public static function getData($sales_id = null): array
    {
        if(!empty($sales_id)){
            return Sales::where(['canceled_at' => NULL])->get(['sales_id','amount'])->where('sales_id','=', $sales_id)->first()->toArray();
        }

        return Sales::where(['canceled_at' => NULL])->get(['sales_id','amount'])->toArray();

    }
}
