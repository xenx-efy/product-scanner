<?php

namespace Xenx\ProductScanner\Price;

class UnitPrice
{
    private int $price;

    public function __construct(float $price)
    {
        $this->price = (int)($price * 100);
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }
}