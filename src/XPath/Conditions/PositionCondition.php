<?php

declare(strict_types=1);

namespace Invariance\Parseval\XPath\Conditions;

use Invariance\Parseval\XPath\ConditionInterface;

readonly class PositionCondition implements ConditionInterface
{
    public function __construct(private int $index, private bool $fromEnd = false) {}

    public function toXPath(): string {
        return $this->fromEnd ? sprintf('[last() - %d]', $this->index - 1) : sprintf('[%d]', $this->index);
    }
}