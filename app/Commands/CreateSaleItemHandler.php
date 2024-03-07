<?php

namespace App\Commands;

use App\Models\LojaABC\SaleItems;

class CreateSaleItemHandler
{
    public function __invoke(CreateSaleItemCommand $command)
    {
        $item = new SaleItems();
        $item->product_id = $command->getProductId();
        $item->name = $command->getName();
        $item->price = $command->getPrice();
        $item->amount = $command->getAmount();
        $item->sales_id = $command->getSalesId();
        $item->save();
    }
}
