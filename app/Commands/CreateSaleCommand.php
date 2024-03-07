<?php

namespace App\Commands;

class CreateSaleCommand
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

    public function getAmount(): int
    {
        return $this->amount;
    }
}
