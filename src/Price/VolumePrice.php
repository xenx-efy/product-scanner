<?php

namespace Xenx\ProductScanner\Price;

class VolumePrice
{
    private int $volumePrice;

    private int $quantityForVolume;

    public function __construct(float $volumePrice, int $quantityForVolume)
    {
        $this->volumePrice = (int)($volumePrice * 100);
        $this->quantityForVolume = $quantityForVolume;
    }

    /**
     * @return int
     */
    public function getQuantityForVolume(): int
    {
        return $this->quantityForVolume;
    }

    /**
     * @return int
     */
    public function getVolumePrice(): int
    {
        return $this->volumePrice;
    }
}