<?php

namespace Services;

use Classes\Query;
use Classes\WaitingTimeline;

/**
 * Class FilteringDataByQueryService
 * @package Services
 * @author Ahmed Helal Ahmed
 */
class FilteringDataByQueryService
{
    /**
     * @param array $data
     * @param Query $query
     * @return array
     * @throws \Exception
     */
    public function execute(array $data, Query $query)
    {
        return array_filter($data, function (WaitingTimeline $waitingTimeline) use ($query) {

            if ($query->getService() != '*' && $waitingTimeline->getService() != $query->getService()) {
                return false;
            }


            if ($query->getQuestionType() != '*' && $waitingTimeline->getQuestionType() != $query->getQuestionType()) {
                return false;
            }


            if ($query->getService() != '*' && $query->getVariation() && $waitingTimeline->getVariation() != $query->getVariation()) {
                return false;
            }

            if ($query->getQuestionType() != '*' && $query->getCategory() && $waitingTimeline->getCategory() != $query->getCategory()) {
                return false;
            }

            if ($query->getQuestionType() != '*' && $query->getSubCategory() && $waitingTimeline->getSubCategory() != $query->getSubCategory()) {
                return false;
            }


            if ($query->getResponseType() && $waitingTimeline->getResponseType() != $query->getResponseType()) {
                return false;
            }

            if ($query->getResponseType() && $waitingTimeline->getResponseType() != $query->getResponseType()) {
                return false;
            }


            if ($query->getDateFrom() && $waitingTimeline->getDate() < $query->getDateFrom()) {
                return false;
            }

            if ($query->getDateTo() && $waitingTimeline->getDate() > $query->getDateTo()) {
                return false;
            }
            return true;
        });
    }
}