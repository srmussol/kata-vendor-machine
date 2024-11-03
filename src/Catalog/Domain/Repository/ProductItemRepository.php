<?php

namespace App\Catalog\Domain\Repository;

use App\Catalog\Domain\ValueObject\ProductId;

interface ProductItemRepository extends RepositoryInterface
{
    public function updatePrice(int $id, float $price): void;

    public function updateQuantity(int $id, int $quantity): void;

    public function add(ProductItem $productItem): void;

    public function remove(ProductItem $productItem): void;



    public function ofId(ProductId $id): ?ProductItem;
}