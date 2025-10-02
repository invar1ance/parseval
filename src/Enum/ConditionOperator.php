<?php

declare(strict_types=1);

namespace Invariance\Parseval\Enum;

enum ConditionOperator: string
{
    case GT = 'gt';
    case GTE = 'gte';
    case LT = 'lt';
    case LTE = 'lte';
    case EQ = 'eq';
    case NEQ = 'neq';
    case StartsWith = 'startsWith';
    case EndsWith = 'endsWith';
    case Contains = 'contains';
}