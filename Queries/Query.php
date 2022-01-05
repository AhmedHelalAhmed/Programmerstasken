<?php

namespace Queries;

use Classes\WaitingTimeline;

interface Query
{
    public function canContinue(\Classes\Query $query, WaitingTimeline $waitingTimeline): bool;
}