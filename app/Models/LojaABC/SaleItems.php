<?php

namespace App\Models\LojaABC;

use App\Commands\CreateSaleItemCommand;
use App\Helpers\Helper;
use App\Queries\GetItems;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Commands\CommandBus;

class SaleItems extends Model
{
    use HasFactory;
    protected $table = 'sale_items';
    protected $fillable = ['sales_id','product_id','name','price','amount'];

    public static function getItems($sales_id, $formatted = true)
    {

        $products = Helper::arrayToObject(GetItems::getData($sales_id));

        // format expected
        if($formatted) {
            foreach ($products as $product) {
                $product->price = number_format($product->price, 0, ',', '.');
            }
        }

        return $products;
    }

    public function callBus($command){
        $this->commandBus->handle($command);
    }

    public static function putItems($sales_id, $products)
    {
        foreach ($products as $product){
            $command = new CreateSaleItemCommand(
                $product->product_id,
                $sales_id,
                $product->name,
                $product->price,
                $product->amount
            );
            $commandBus = new CommandBus();
            $commandBus->handle($command);
        }
    }

}
