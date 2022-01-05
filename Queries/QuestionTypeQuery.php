<?php namespace Queries;

use Classes\WaitingTimeline;

class QuestionTypeQuery implements Query
{
    public function canNotContinue(\Classes\Query $query, WaitingTimeline $waitingTimeline): bool
    {
        return $query->getQuestionType() != '*' && $waitingTimeline->getQuestionType() != $query->getQuestionType();
    }
}