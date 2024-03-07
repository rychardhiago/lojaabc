<?php

namespace App\Commands;

use App\Models\LojaABC\Sales;

class UpdateAmountSaleHandler
{
    public function __invoke(UpdateAmountSaleCommand $command)
    {
        Sales::Where('sales_id', $command->getSalesId())->update((['amount' => $command->getAmount()]));
    }
}
