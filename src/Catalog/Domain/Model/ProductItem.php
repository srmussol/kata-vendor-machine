<?php
declare(strict_types=1);

namespace App\Catalog\Domain\Model;

use App\Catalog\Domain\ValueObject\ProductId;
use App\Catalog\Domain\ValueObject\ProductName;
use App\Catalog\Domain\ValueObject\ProductPrice;
use App\Catalog\Domain\ValueObject\ProductQuantity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\ORM\Entity]
class ProductItem
{
    #[ORM\Embedded(columnPrefix: false)]
    private readonly ProductId $id;

    public function __construct(
        #[ORM\Embedded(columnPrefix: false)]
        private  ProductName $name,
        #[ORM\Embedded(columnPrefix: false)]
        private ProductPrice $price,
        #[ORM\Embedded(columnPrefix: false)]
        private ProductQuantity $quantity
    ) {
        $this->id = new ProductId();
    }

    public function update(?ProductName $name,?ProductPrice $price,?ProductQuantity $quantity): void
    {
        $this->name = $name ?? $this->name;
        $this->price = $price ?? $this->price;
        $this->quantity = $quantity ?? $this->quantity;
    }

    public function id(): ProductId
    {
        return $this->id;
    }

    public function name(): ProductName
    {
        return $this->name;
    }

    public function price(): ProductPrice
    {
        return $this->price;
    }

    public function quantity(): ProductQuantity
    {
        return $this->quantity;
    }


}