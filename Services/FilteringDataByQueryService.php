<?php

namespace Services;

use Classes\Query;
use Classes\WaitingTimeline;
use Exception;
use Queries\CategoryQuery;
use Queries\DateFromQuery;
use Queries\DateToQuery;
use Queries\QuestionTypeQuery;
use Queries\ResponseTypeQuery;
use Queries\ServiceQuery;
use Queries\SubCategoryQuery;
use Queries\VariationQuery;

/**
 * Class FilteringDataByQueryService
 * @package Services
 * @author Ahmed Helal Ahmed
 */
class FilteringDataByQueryService
{

    const QUERY_PATTERNS = [
        ServiceQuery::class,
        QuestionTypeQuery::class,
        VariationQuery::class,
        CategoryQuery::class,
        SubCategoryQuery::class,
        ResponseTypeQuery::class,
        DateFromQuery::class,
        DateToQuery::class
    ];

    /**
     * @param array $data
     * @param Query $query
     * @return array
     * @throws Exception
     */
    public function execute(array $data, Query $query): array
    {
        return array_filter($data, function (WaitingTimeline $waitingTimeline) use ($query) {
            foreach (self::QUERY_PATTERNS as $queryPattern) {
                if ((new $queryPattern)->canNotContinue($query, $waitingTimeline)) {
                    return false;
                }
            }
            return true;
        });
    }
}