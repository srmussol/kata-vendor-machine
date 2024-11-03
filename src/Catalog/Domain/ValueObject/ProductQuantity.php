<?php

namespace App\Catalog\Domain\ValueObject;

use Webmozart\Assert\Assert;

class ProductQuantity
{
    #[ORM\Column(name: 'quantity', type: 'int', options: ['unsigned' => true])]
    public readonly int $quantity;
    public function __construct(int $quantity)
    {
        Assert::greaterThanEq($amount, 0);
        $this->quantity = $quantity;
    }
}