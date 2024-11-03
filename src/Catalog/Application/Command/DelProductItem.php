<?php

namespace App\Catalog\Application\Command;

class DelProductItem implements CommandInterface
{
    public function __construct(
        public ProductId $id,
    ) {
    }
}