<?php

namespace App\Models\LojaABC;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SaleItems extends Model
{
    use HasFactory;
    protected $table = 'sale_items';
    protected $fillable = ['sales_id','product_id','name','price','amount'];

    public static function getItems($sales_id, $formatted = true)
    {

        $products = DB::table('sale_items')->where(['sales_id'=>$sales_id])->orderBy('product_id', 'ASC')->get(['product_id','name','price','amount']);

        // format expected
        if($formatted) {
            foreach ($products as $product) {
                $product->price = number_format($product->price, 0, ',', '.');
            }
        }

        return $products;
    }

    public static function putItems($sales_id, $products)
    {
        foreach ($products as $product){
            $item = new SaleItems();
            $item->product_id = $product->product_id;
            $item->name = $product->name;
            $item->price = str_replace('.','',$product->price);
            $item->amount = $product->amount;
            $item->sales_id = $sales_id;
            $item->save();
        }
    }

}
