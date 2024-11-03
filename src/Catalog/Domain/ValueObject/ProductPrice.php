<?php

namespace App\Catalog\Domain\ValueObject;
use Doctrine\ORM\Mapping as ORM;
use Webmozart\Assert\Assert;

#[ORM\ORM\Embeddable]
class ProductPrice
{
    #[ORM\Column(name: 'price', type: 'float', options: ['unsigned' => true])]
    public readonly float $amount;

    public function __construct(float $amount)
    {
        Assert::greaterThanEq($amount, 0);

        $this->amount = $amount;
    }
}