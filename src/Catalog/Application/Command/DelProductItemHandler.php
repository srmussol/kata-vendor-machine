<?php

namespace App\Catalog\Application\Command;

class DelProductItemHandler
{
    public function __construct(private ProductItemRepositoryInterface $productItemRepository)
    {
    }
    public function __invoke(DelProductItem $command): void
    {
        if(null === $productItem = $this->productItemRepository->ofId($command->id)){
            return;
        }
        $this->productItemRepository->remove($productItem);
    }
}