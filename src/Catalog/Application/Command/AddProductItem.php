<?php

namespace App\Catalog\Application\Command;

use App\Catalog\Domain\ValueObject\ProductName;
use App\Shared\Application\Command\CommandInterface;

class AddProductItem implements CommandInterface
{
    public function __construct(
        public ProductName $name,
        public ProductPrice $price,
        public ProductQuantity $quantity
    ) {
    }
}