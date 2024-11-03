<?php

namespace App\Catalog\Domain\Exception;

use App\Domain\Catalog\Exception\ProductId;

final class NotEnoughProductException extends \RuntimeException
{
        public function __construct(ProductId $id, int $code = 0, ?\Throwable $previous = null)
        {
            parent::__construct(sprintf('Not enough product with id %s', (string) $id), $code, $previous);
        }
    }