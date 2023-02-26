<?php

declare(strict_types=1);

namespace PHP\ExtendedTypeSystem\Type;

/**
 * @psalm-api
 * @psalm-immutable
 * @template-covariant T of list
 * @implements Type<T>
 */
final class ListShapeT implements Type
{
    /**
     * @var array<ArrayShapeItem>
     */
    public readonly array $items;

    /**
     * @param list<Type|ArrayShapeItem> $items
     */
    public function __construct(
        array $items = [],
        public readonly bool $sealed = true,
    ) {
        $this->items = array_map(
            static fn (Type|ArrayShapeItem $item): ArrayShapeItem => $item instanceof Type ? new ArrayShapeItem($item) : $item,
            $items,
        );
    }

    public function accept(TypeVisitor $visitor): mixed
    {
        return $visitor->visitListShape($this);
    }
}