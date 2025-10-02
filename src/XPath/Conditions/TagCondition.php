<?php

declare(strict_types=1);

namespace Invariance\Parseval\XPath\Conditions;

use Invariance\Parseval\XPath\ConditionInterface;

readonly class TagCondition implements ConditionInterface
{
    public function __construct(private string $tag) {}

    public function toXPath(): string {
        return $this->tag;
    }
}
