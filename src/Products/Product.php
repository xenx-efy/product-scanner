<?php

namespace Xenx\ProductScanner\Products;

use Xenx\ProductScanner\Price\ProductPrice;

class Product
{
    private string $code;

    public ProductPrice $price;

    public function __construct(string $code, ProductPrice $price)
    {
        $this->code = $code;
        $this->price = $price;
    }

    public function getCode(): string
    {
        return $this->code;
    }
}