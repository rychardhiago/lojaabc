<?php

namespace App\Commands;

use App\Models\LojaABC\Sales;

class CancelSaleHandler
{
    public function __invoke(CancelSaleCommand $command)
    {
        Sales::Where('sales_id', $command->getSalesId())->update((['canceled_at' => now()]));
    }
}
