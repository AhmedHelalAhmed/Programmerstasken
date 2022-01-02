<?php

namespace Services;

use Classes\Query;
use Helpers\ArrayHelper;

/**
 * Class BuildingQueryService
 * @package Services
 * @author Ahmed Helal Ahmed
 */
class BuildingQueryService extends BuilderService
{
    /**
     * @param array $lineValues
     * @return Query
     */
    public function execute(array $lineValues)
    {

        [
            ,
            $serviceVariation,
            $questionTypeAndCategoryAndSubcategory,
            $responseType,
            $dates
        ] = $lineValues;

        $datesVales = explode('-', $dates);
        $dateFrom = ArrayHelper::getValueOfIndex(Query::DATE_FROM, $datesVales);
        $dateTo = ArrayHelper::getValueOfIndex(Query::DATE_TO, $datesVales);
        [$service, $variation] = $this->getServiceAndVariation($serviceVariation);
        [
            $questionType,
            $category,
            $subcategory
        ] = $this->getQuestionAndCategoryAndSubcategory($questionTypeAndCategoryAndSubcategory);


        return (new Query())
            ->setService($service)
            ->setVariation(is_null($variation) ? null : intval($variation))
            ->setQuestionType($questionType)
            ->setResponseType($responseType)
            ->setCategory(is_null($category) ? null : intval($category))
            ->setSubCategory(is_null($subcategory) ? null : intval($subcategory))
            ->setDateFrom($dateFrom)
            ->setDateTo(is_null($dateTo) ? null : $dateTo);
    }


}