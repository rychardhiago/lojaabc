<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sales extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $fillable = ['sales_id','amount', 'canceled_at'];

    /**
     * Update total of Sale by products
     */
    protected function calTotal($sales_id)
    {
        $total = 0;

        $products = SaleItems::getItems($sales_id, false);

        foreach ($products as $product){
            $total = $total + ($product->price * $product->amount);
        }

        Sales::Where('sales_id',$sales_id)->update((['amount' => $total]));

        return $total;

    }
}
