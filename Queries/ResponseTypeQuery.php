<?php namespace Queries;

use Classes\WaitingTimeline;

class ResponseTypeQuery implements Query
{
    public function canContinue(\Classes\Query $query, WaitingTimeline $waitingTimeline): bool
    {
        return $query->getResponseType() && $waitingTimeline->getResponseType() != $query->getResponseType();
    }
}