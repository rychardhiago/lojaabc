<?php

namespace App\Commands;

class CreateSaleItemCommand
{
    private $product_id;
    private $sales_id;
    private $name;
    private $price;
    private $amount;

    public function __construct($product_id, $sales_id, $name, $price, $amount)
    {
        $this->product_id = $product_id;
        $this->sales_id = $sales_id;
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function getSalesId(): int
    {
        return $this->sales_id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return str_replace('.','',$this->price);
    }

    public function getAmount(): int
    {
        return $this->amount;
    }
}
