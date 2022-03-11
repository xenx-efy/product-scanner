<?php

namespace Xenx\ProductScanner;

use Xenx\ProductScanner\Products\Product;
use Xenx\ProductScanner\Products\ProductsCatalog;

class Terminal
{
    private ProductsCatalog $catalog;

    /**
     * @var array<string>
     */
    private array $productsCodes;

    private int $total = 0;

    public function __construct(ProductsCatalog $catalog)
    {
        $this->catalog = $catalog;
    }

    public function scan(string $productCode, string ...$productCodes): void
    {
        if (strlen($productCode) > 1) {
            $productCodes = array_merge($productCodes, str_split($productCode));
        } else {
            $this->productsCodes[] = $productCode;
        }

        foreach ($productCodes as $item) {
            if (empty($item)) {
                continue;
            }
            $this->productsCodes[] = $item;
        }
    }

    public function total(): string
    {
        /** @var array<string, int> $productsCount */
        $productsCount = array_count_values($this->productsCodes);

        foreach ($productsCount as $productCode => $productCount) {
            /** @var Product|false $product */
            $product = $this->catalog->get($productCode);
            if ($product) {
                $this->total += $product->price->calculate($productCount);
            }
        }


        return sprintf('%s$', $this->total / 100);
    }
}