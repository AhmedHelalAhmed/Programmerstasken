<?php

namespace Queries;

use Classes\WaitingTimeline;

class ServiceQuery implements Query
{
    public function canNotContinue(\Classes\Query $query, WaitingTimeline $waitingTimeline): bool
    {
        return $query->getService() != '*' && $waitingTimeline->getService() != $query->getService();
    }
}