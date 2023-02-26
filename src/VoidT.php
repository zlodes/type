<?php

declare(strict_types=1);

namespace PHP\ExtendedTypeSystem\Type;

/**
 * @psalm-api
 * @psalm-immutable
 * @implements Type<void>
 */
final class VoidT implements Type
{
    public function accept(TypeVisitor $visitor): mixed
    {
        return $visitor->visitVoid($this);
    }
}