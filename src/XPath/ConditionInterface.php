<?php

declare(strict_types=1);

namespace Invariance\Parseval\XPath;

interface ConditionInterface
{
    public function toXPath(): string;
}