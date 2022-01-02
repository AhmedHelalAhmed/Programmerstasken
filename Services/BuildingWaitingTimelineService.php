<?php

namespace Services;

use Classes\Model;
use Classes\WaitingTimeline;
use Helpers\ArrayHelper;

/**
 * Class BuildingWaitingTimelineService
 * @package Services
 * @author Ahmed Helal Ahmed
 */
class BuildingWaitingTimelineService extends BuilderService
{
    /**
     * @param array $lineValues
     * @return WaitingTimeline
     */
    public function execute(array $lineValues)
    {
        [
            ,
            $serviceVariation,
            $questionTypeAndCategoryAndSubcategory,
            $responseType,
            $date,
            $time
        ] = $lineValues;

        $serviceVariationValues = explode('.', $serviceVariation);
        $questionTypeAndCategoryAndSubcategoryValues = explode('.', $questionTypeAndCategoryAndSubcategory);
        $service = ArrayHelper::getValueOfIndex(Model::SERVICE, $serviceVariationValues);
        $variation = ArrayHelper::getValueOfIndex(Model::VARIATION, $serviceVariationValues);
        $questionType = ArrayHelper::getValueOfIndex(Model::QUESTION_TYPE,
            $questionTypeAndCategoryAndSubcategoryValues);
        $category = ArrayHelper::getValueOfIndex(Model::CATEGORY,
            $questionTypeAndCategoryAndSubcategoryValues);
        $subcategory = ArrayHelper::getValueOfIndex(Model::SUBCATEGORY,
            $questionTypeAndCategoryAndSubcategoryValues);

        return (new WaitingTimeline())
            ->setService($service)
            ->setVariation(is_null($variation) ? null : intval($variation))
            ->setQuestionType($questionType)
            ->setResponseType($responseType)
            ->setCategory(is_null($category) ? null : intval($category))
            ->setSubCategory(is_null($subcategory) ? null : intval($subcategory))
            ->setDate($date)
            ->setTime($time);
    }
}