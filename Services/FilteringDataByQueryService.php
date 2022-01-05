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

    const QUERY_PATTERNS = [
        \Queries\ServiceQuery::class,
        \Queries\QuestionTypeQuery::class,
        \Queries\VariationQuery::class,
        \Queries\CategoryQuery::class,
        \Queries\SubCategoryQuery::class,
        \Queries\ResponseTypeQuery::class,
        \Queries\DateFromQuery::class,
        \Queries\DateToQuery::class
    ];

    /**
     * @param array $data
     * @param Query $query
     * @return array
     * @throws \Exception
     */
    public function execute(array $data, Query $query)
    {
        return array_filter($data, function (WaitingTimeline $waitingTimeline) use ($query) {
            foreach (self::QUERY_PATTERNS as $queryPattern) {
                if ((new $queryPattern)->canContinue($query, $waitingTimeline)) {
                    return false;
                }
            }
            return true;
        });
    }
}