<?php

namespace App\Commands;

class UpdateAmountSaleCommand
{
    private $sales_id;
    private $amount;

    public function __construct($sales_id, $amount)
    {
        $this->sales_id = $sales_id;
        $this->amount = $amount;
    }

    public function getSalesId(): int
    {
        return $this->sales_id;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }
}
