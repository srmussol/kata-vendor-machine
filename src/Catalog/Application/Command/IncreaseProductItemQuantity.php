<?php

namespace App\Catalog\Application\Command;

class IncreaseProductItemQuantity
{
    public function __construct(public ProductId $productId, public ProductQuantity $newQuantity)
    {
    }
}