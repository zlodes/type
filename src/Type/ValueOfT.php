<?php

declare(strict_types=1);

namespace ExtendedTypeSystem\Type;

use ExtendedTypeSystem\Type;
use ExtendedTypeSystem\TypeVisitor;

/**
 * @psalm-api
 * @psalm-immutable
 * @template-covariant T
 * @implements Type<T>
 */
final class ValueOfT implements Type
{
    /**
     * @param Type<T> $type
     */
    public function __construct(
        public readonly Type $type,
    ) {
    }

    public function accept(TypeVisitor $visitor): mixed
    {
        return $visitor->visitValueOf($this);
    }
}
