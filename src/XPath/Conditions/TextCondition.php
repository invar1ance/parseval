<?php

declare(strict_types=1);

namespace Invariance\Parseval\XPath\Conditions;

use Invariance\Parseval\XPath\ConditionInterface;

readonly class TextCondition implements ConditionInterface
{
    public function __construct(private string $text, private bool $contains = false) {}

    public function toXPath(): string {
        return $this->contains
            ? sprintf('[contains(text(),"%s")]', $this->text)
            : sprintf('[text()="%s"]', $this->text);
    }
}