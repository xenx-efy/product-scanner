<?php

namespace Xenx\ProductScanner\Products;


class ProductsCatalog
{
    /**
     * @var array<string, Product> $catalog
     */
    private array $catalog;

    public function __construct(Product ...$products)
    {
        foreach ($products as $product) {
            $this->add($product);
        }
    }

    public function add(Product $product): bool
    {
        if ($this->isUniq($product)) {
            $this->catalog[$product->getCode()] = $product;
            return true;
        }

        return false;
    }

    public function remove(string $code): void
    {
        unset($this->catalog[$code]);
    }

    /**
     * @param string|int $code
     * @return Product|false
     */
    public function get(string|int $code): Product|bool
    {
        return $this->catalog[$code] ?? false;
    }

    private function isUniq(Product $product): bool
    {
        return !isset($this->catalog[$product->getCode()]);
    }
}