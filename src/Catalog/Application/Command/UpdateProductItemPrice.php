<?php

namespace App\Catalog\Application\Command;

class UpdateProductItemPrice
{
    public function __construct(public ProductId $productId, public ProductPrice $newPrice)
    {
    }
}