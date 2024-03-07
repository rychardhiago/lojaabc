<?php

namespace App\Commands;

use App\Models\LojaABC\Sales;

class CreateSaleHandler
{
    public function __invoke(CreateSaleCommand $command)
    {
        $item = new Sales();
        $item->amount = $command->getAmount();
        $item->sales_id = $command->getSalesId();
        $item->save();

        return $item;
    }
}
