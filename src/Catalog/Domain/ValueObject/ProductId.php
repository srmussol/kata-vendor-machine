<?php
declare(strict_types=1);
namespace App\Catalog\Domain\ValueObject;

use App\Shared\Domain\ValueObject\AggregateRootId;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class ProductId implements \Stringable
{
    use AggregateRootId;
}