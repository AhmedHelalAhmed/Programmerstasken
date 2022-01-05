<?php namespace Queries;

use Classes\WaitingTimeline;

class DateToQuery implements Query
{
    public function canContinue(\Classes\Query $query, WaitingTimeline $waitingTimeline): bool
    {
        return $query->getDateTo() && $waitingTimeline->getDate() > $query->getDateTo();
    }
}