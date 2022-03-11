<?php

use Xenx\ProductScanner\Price\ProductPrice;
use Xenx\ProductScanner\Price\UnitPrice;
use Xenx\ProductScanner\Price\VolumePrice;
use Xenx\ProductScanner\Products\Product;
use Xenx\ProductScanner\Products\ProductsCatalog;
use Xenx\ProductScanner\Terminal;

require_once 'vendor/autoload.php';

$productsCatalog = new ProductsCatalog(
    new Product('A', new ProductPrice(new UnitPrice(2), new VolumePrice(7, 4))),
    new Product('B', new ProductPrice(new UnitPrice(12))),
    new Product('C', new ProductPrice(new UnitPrice(1.25), new VolumePrice(6, 6))),
    new Product('D', new ProductPrice(new UnitPrice(0.15))),
);

$terminal = new Terminal($productsCatalog);

$terminal->scan('ABCDABAA');
echo $terminal->total() . PHP_EOL;
$terminal->closeSession();

$terminal->scan('CCCCCCC');
echo $terminal->total() . PHP_EOL;
$terminal->closeSession();

$terminal->scan('ABCD');
echo $terminal->total() . PHP_EOL;
$terminal->closeSession();