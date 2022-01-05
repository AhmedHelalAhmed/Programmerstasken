<?php namespace Queries;

use Classes\WaitingTimeline;

class ResponseTypeQuery implements Query
{
    public function canNotContinue(\Classes\Query $query, WaitingTimeline $waitingTimeline): bool
    {
        return $query->getResponseType() && $waitingTimeline->getResponseType() != $query->getResponseType();
    }
}