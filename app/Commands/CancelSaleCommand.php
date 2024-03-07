<?php

namespace App\Commands;

class CancelSaleCommand
{
    private $sales_id;

    public function __construct($sales_id)
    {
        $this->sales_id = $sales_id;
    }

    public function getSalesId(): int
    {
        return $this->sales_id;
    }
}
