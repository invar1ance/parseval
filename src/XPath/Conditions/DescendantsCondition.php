<?php

declare(strict_types=1);

namespace Invariance\Parseval\XPath\Conditions;

use Invariance\Parseval\HtmlQuery;
use Invariance\Parseval\XPath\ConditionInterface;

readonly class DescendantsCondition implements ConditionInterface
{
    public function __construct(private HtmlQuery $builder) {}

    public function toXPath(): string {
        return '//' . $this->builder->toXPath();
    }
}