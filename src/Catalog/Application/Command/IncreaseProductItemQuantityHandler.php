<?php

namespace App\Catalog\Application\Command;

class IncreaseProductItemQuantityHandler
{
    public function __construct(
        private ProductRepository $productRepository
    ) {
    }

    public function __invoke(IncreaseProductItemQuantity $command): void
    {
        $product = $this->productRepository->get($command->productId);

        $product->quantity($command->newQuantity);

        $this->productRepository->updateQuantity($product);
    }
}