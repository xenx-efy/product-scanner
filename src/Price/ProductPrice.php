<?php

namespace Xenx\ProductScanner\Price;

class ProductPrice
{
    private UnitPrice $unitPrice;

    private ?VolumePrice $volumePrice;

    /**
     * @param UnitPrice $unitPrice
     * @param VolumePrice|null $volumePrice
     */
    public function __construct(UnitPrice $unitPrice, ?VolumePrice $volumePrice = null)
    {
        $this->unitPrice = $unitPrice;
        $this->volumePrice = $volumePrice;
    }

    public function calculate(int $productQuantity): int
    {
        $price = 0;

        if (
            $this->volumePrice &&
            $productQuantity >= ($quantityForVolume = $this->volumePrice->getQuantityForVolume())
        ) {
            $stacks_count = intdiv($productQuantity, $quantityForVolume);
            $volumeItemsCount = $stacks_count * $quantityForVolume;
            $price += $stacks_count * $this->volumePrice->getVolumePrice();

            $productQuantity -= $volumeItemsCount;
        }

        $price += $this->unitPrice->getPrice() * $productQuantity;

        return $price;
    }
}