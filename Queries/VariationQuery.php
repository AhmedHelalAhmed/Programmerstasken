<?php

namespace Queries;

use Classes\WaitingTimeline;

class VariationQuery implements Query
{
    public function canContinue(\Classes\Query $query, WaitingTimeline $waitingTimeline): bool
    {
        return $query->getService() != '*' && $query->getVariation() && $waitingTimeline->getVariation() != $query->getVariation();
    }
}