<?php

namespace App\Catalog\Application\Command;

class UpdateProductItemPriceHandler
{
    public function __construct(private ProductItemRepository $productItemRepository)
    {
    }

    public function __invoke(UpdateProductItemPrice $command): void
    {
        if (null === $productItem = $this->productItemRepository->ofId($command->productId)) {
            return;
        }

        $productItem->changePrice($command->newPrice);

        $this->productItemRepository->update($productItem);
    }
}