<?php

namespace Queries;

use Classes\WaitingTimeline;

class CategoryQuery implements Query
{
    public function canContinue(\Classes\Query $query, WaitingTimeline $waitingTimeline): bool
    {
        return $query->getQuestionType() != '*' && $query->getCategory() && $waitingTimeline->getCategory() != $query->getCategory();
    }
}