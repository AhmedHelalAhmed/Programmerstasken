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

            if ((new \Queries\ServiceQuery())->canContinue($query, $waitingTimeline)) {
                return false;
            }

            if ((new \Queries\QuestionTypeQuery())->canContinue($query, $waitingTimeline)) {
                return false;
            }

            if ((new \Queries\VariationQuery())->canContinue($query, $waitingTimeline)) {
                return false;
            }

            if ((new \Queries\CategoryQuery)->canContinue($query, $waitingTimeline)) {
                return false;
            }

            if ((new \Queries\SubCategoryQuery)->canContinue($query, $waitingTimeline)) {
                return false;
            }


            if ((new \Queries\ResponseTypeQuery())->canContinue($query, $waitingTimeline)) {
                return false;
            }


            if ((new \Queries\DateFromQuery)->canContinue($query, $waitingTimeline)) {
                return false;
            }

            if ((new \Queries\DateToQuery)->canContinue($query, $waitingTimeline)) {
                return false;
            }

            return true;
        });
    }
}