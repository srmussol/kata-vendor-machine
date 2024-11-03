<?php

namespace App\Catalog\Application\Command;

use App\Catalog\Domain\Repository\ProductItemRepository;

class DecreaseProductItemQuantityHandler
{
    public function __construct(private ProductItemRepository $productRepository)
    {
    }
    Public function handle(DecreaseProductItemQuantity $command): void
    {
        $product = $this->productRepository->get($command->productId);
        $product->decreaseQuantity($command->quantity);
        $this->productRepository->update($product);
    }
}