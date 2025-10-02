<?php

declare(strict_types=1);

namespace Invariance\Parseval\XPath\Conditions;

use Invariance\Parseval\XPath\ConditionInterface;

readonly class OrCondition implements ConditionInterface
{
    /** @param ConditionInterface[] $conditions */
    public function __construct(private array $conditions) {}

    public function toXPath(): string
    {
        return '(' . implode(' | ', array_map(fn($c) => $c->toXPath(), $this->conditions)) . ')';
    }
}