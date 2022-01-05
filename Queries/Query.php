<?php

namespace Queries;

use Classes\WaitingTimeline;

interface Query
{
    public function canNotContinue(\Classes\Query $query, WaitingTimeline $waitingTimeline): bool;
}