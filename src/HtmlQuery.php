<?php

declare(strict_types=1);

namespace Invariance\Parseval;

use Invariance\Parseval\XPath\ConditionInterface;
use Invariance\Parseval\XPath\Conditions\AttributeCondition;
use Invariance\Parseval\XPath\Conditions\ChildCondition;
use Invariance\Parseval\XPath\Conditions\DescendantsCondition;
use Invariance\Parseval\XPath\Conditions\TagCondition;
use Invariance\Parseval\XPath\Conditions\TextCondition;

class HtmlQuery
{
    /** @var ConditionInterface[] */
    public array $conditions = [];

    public function whereTag(string $tag): self {
        $this->conditions[] = new TagCondition($tag);
        return $this;
    }

    public function whereAttribute(string $attr, string $operator, string $value): self {
        $this->conditions[] = new AttributeCondition($attr, $operator, $value);
        return $this;
    }

    public function whereText(string $text, bool $contains = false): self {
        $this->conditions[] = new TextCondition($text, $contains);
        return $this;
    }

    public function whereChild(callable $callback): self {
        $childBuilder = new self();
        $callback($childBuilder);
        $this->conditions[] = new ChildCondition($childBuilder);
        return $this;
    }

    public function whereDescendants(callable $callback): self {
        $descBuilder = new self();
        $callback($descBuilder);
        $this->conditions[] = new DescendantsCondition($descBuilder);
        return $this;
    }

    public function toXPath(): string {
        return implode('', array_map(fn($c) => $c->toXPath(), $this->conditions));
    }
}