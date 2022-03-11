<?php

namespace Xenx\ProductScanner\Price;

class UnitPrice
{
    private int $price;

    public function __construct(int $price)
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }
}