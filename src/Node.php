<?php

declare(strict_types=1);

namespace Invariance\Parseval;

use Invariance\Parseval\Enum\HtmlAttribute;

class Node
{
    public private(set) string $tag;

    public function attribute(HtmlAttribute|string $attributeName): string
    {

    }
}