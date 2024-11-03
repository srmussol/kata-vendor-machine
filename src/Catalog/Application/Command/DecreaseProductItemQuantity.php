<?php

namespace App\Catalog\Application\Command;

class DecreaseProductItemQuantity
{
    public function __construct(public ProductId $productId, public ProductQuantity $quantity)
    {
    }
}