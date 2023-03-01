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
final class TemplateT implements Type
{
    public function __construct(
        public readonly string $name,
        public readonly AtFunction|AtClass|AtMethod $declaredAt,
    ) {
    }

    public function accept(TypeVisitor $visitor): mixed
    {
        return $visitor->visitTemplate($this);
    }
}