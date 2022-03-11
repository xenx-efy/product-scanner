<?php

use Xenx\ProductScanner\Price\ProductPrice;
use Xenx\ProductScanner\Price\UnitPrice;
use Xenx\ProductScanner\Price\VolumePrice;
use Xenx\ProductScanner\Products\Product;
use Xenx\ProductScanner\Products\ProductsCatalog;
use Xenx\ProductScanner\Terminal;

require_once 'vendor/autoload.php';

$productsCatalog = new ProductsCatalog(
    new Product('A', new ProductPrice(new UnitPrice(200), new VolumePrice(700, 4))),
    new Product('B', new ProductPrice(new UnitPrice(1200))),
    new Product('C', new ProductPrice(new UnitPrice(125), new VolumePrice(600, 6))),
    new Product('D', new ProductPrice(new UnitPrice(15))),
);

$terminal = new Terminal($productsCatalog);

//$terminal->scan('ABCDABAA');
$terminal->scan('AAAAAAAAAAAAAAAAAAa');

echo $terminal->total();
