<?php

namespace App\Catalog\Application\Command;

use App\Shared\Application\Command\AsCommandHandler;

#[AsCommandHandler]
final readonly class AddProductItemHandler
{
    public function __construct(private ProductItemRepositoryInterface $productItemRepository)
    {
    }

    public function __invoke(AddProductItem $command): void
    {
        $productItem = new ProductItem(
            $command->name,
            $command->price,
            $command->quantity
        );

        $this->productItemRepository->add($productItem);
    }
}