<?php namespace Queries;

use Classes\WaitingTimeline;

class DateFromQuery implements Query
{
    public function canNotContinue(\Classes\Query $query, WaitingTimeline $waitingTimeline): bool
    {
        return $query->getDateFrom() && $waitingTimeline->getDate() < $query->getDateFrom();
    }
}