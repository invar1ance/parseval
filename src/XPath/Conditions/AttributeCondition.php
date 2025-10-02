<?php

declare(strict_types=1);

namespace Invariance\Parseval\XPath\Conditions;

use Invariance\Parseval\XPath\ConditionInterface;

readonly class AttributeCondition implements ConditionInterface {
    public function __construct(
        private string $attribute,
        private string $operator,
        private string $value
    ) {}

    public function toXPath(): string {
        return match($this->operator) {
            '=' => sprintf('[@%s="%s"]', $this->attribute, $this->value),
            'contains' => sprintf('[contains(@%s,"%s")]', $this->attribute, $this->value),
            'starts-with' => sprintf('[starts-with(@%s,"%s")]', $this->attribute, $this->value),
            'ends-with' => sprintf('[substring(@%s, string-length(@%s) - string-length("%s") + 1) = "%s"]',
                $this->attribute, $this->attribute, $this->value, $this->value),
            default => throw new \InvalidArgumentException("Unknown operator {$this->operator}")
        };
    }
}