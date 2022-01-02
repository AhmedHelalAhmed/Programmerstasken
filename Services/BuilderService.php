<?php

namespace Services;

use Classes\Model;
use Helpers\ArrayHelper;

abstract class BuilderService
{
    protected function getServiceAndVariation(string $serviceVariation)
    {

        $serviceVariationValues = explode('.', $serviceVariation);

        return [
            ArrayHelper::getValueOfIndex(Model::SERVICE, $serviceVariationValues),
            ArrayHelper::getValueOfIndex(Model::VARIATION, $serviceVariationValues)
        ];
    }

    protected function getQuestionAndCategoryAndSubcategory($questionTypeAndCategoryAndSubcategory)
    {
        $questionTypeAndCategoryAndSubcategoryValues = explode('.', $questionTypeAndCategoryAndSubcategory);

        return [
            ArrayHelper::getValueOfIndex(Model::QUESTION_TYPE,
                $questionTypeAndCategoryAndSubcategoryValues),
            ArrayHelper::getValueOfIndex(Model::CATEGORY,
                $questionTypeAndCategoryAndSubcategoryValues),
            ArrayHelper::getValueOfIndex(Model::SUBCATEGORY,
                $questionTypeAndCategoryAndSubcategoryValues)
        ];
    }
}