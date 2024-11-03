<?php

namespace App\Catalog\Infrastructure\ApiPlatform\Resource;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\BookStore\Infrastructure\ApiPlatform\State\Processor\CreateBookProcessor;
use App\BookStore\Infrastructure\ApiPlatform\State\Processor\DeleteBookProcessor;
use App\BookStore\Infrastructure\ApiPlatform\State\Processor\UpdateBookProcessor;
use App\BookStore\Infrastructure\ApiPlatform\State\Provider\BookItemProvider;
use App\Catalog\Domain\Model\ProductItem;
use App\Catalog\Infrastructure\ApiPlatform\State\Processor\AddProductProcessor;
use App\Catalog\Infrastructure\ApiPlatform\State\Processor\DeleteProductProcessor;

#[ApiResource(
    shortName: 'ProductItem',
    operations: [
        new Get(
            provider: BookItemProvider::class,
        ),
        new Post(
            validationContext: ['groups' => ['create']],
            processor: AddProductProcessor::class,
        ),
        new Put(
            provider: ProductItemProvider::class,
            processor: UpdateBookProcessor::class,
        ),
        new Patch(
            provider:  ProductItemProvider::class,
            processor: UpdateBookProcessor::class,
        ),
        new Delete(
            provider: BookItemProvider::class,
            processor: DeleteProductProcessor::class,
        ),
    ]
)]
final class ProductItemResource
{
    #[ApiProperty(identifier: true, readable: false, writable: false)]
    public $id  = null;

    #[Assert\NotNull(groups: ['create'])]
    #[Assert\Length(min: 1, max: 255, groups: ['create', 'Default'])]
    public $name  = null;

    #[Assert\NotNull(groups: ['create'])]
    #[Assert\PositiveOrZero(groups: ['create', 'Default'])]
    public ?float $price = null;

    #[Assert\NotNull(groups: ['create'])]
    #[Assert\PositiveOrZero(groups: ['create', 'Default'])]
    public ?int $quantity  = null;

    public function fromModel(ProductItem $productItem): self
    {
        return new self(
            $productItem->id()->value,
            $productItem->name()->value,
            $productItem->price()->amount,
            $productItem->quantity()->quantity
        );
    }
}