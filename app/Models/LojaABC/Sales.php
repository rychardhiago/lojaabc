<?php

namespace App\Models\LojaABC;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $fillable = ['sales_id','amount', 'canceled_at'];

    /**
     * Update total of Sale by products
     */
    protected function calTotal($sales_id,$request = null)
    {
        $total = 0;

        $products = SaleItems::getItems($sales_id, false);

        foreach ($products as $product){
            $total = $total + ($product->price * intval($product->amount));
        }

        Sales::Where('sales_id',$sales_id)->update((['amount' => $total]));

        return $total;
    }
}
