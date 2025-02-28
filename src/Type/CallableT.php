<?php

declare(strict_types=1);

namespace ExtendedTypeSystem\Type;

use ExtendedTypeSystem\Type;
use ExtendedTypeSystem\TypeVisitor;

/**
 * @psalm-api
 * @psalm-immutable
 * @template-covariant TReturn
 * @implements Type<callable(): TReturn>
 */
final class CallableT implements Type
{
    /**
     * @var list<CallableParameter>
     */
    public readonly array $parameters;

    /**
     * @param list<Type|CallableParameter> $parameters
     * @param Type<TReturn> $returnType
     */
    public function __construct(
        array $parameters = [],
        public readonly ?Type $returnType = null,
    ) {
        $this->parameters = array_map(
            static fn (Type|CallableParameter $parameter): CallableParameter => $parameter instanceof Type ? new CallableParameter($parameter) : $parameter,
            $parameters,
        );
    }

    public function accept(TypeVisitor $visitor): mixed
    {
        return $visitor->visitCallable($this);
    }
}
