<?php

namespace App\Catalog\Domain\Exception;

class MissingProductItemException  extends \RuntimeException
{
    public function __construct(ProductId $id, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct(sprintf('Cannot find product with id %s', (string) $id), $code, $previous);
    }
}