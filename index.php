<?php

use Classes\Model;
use Classes\Query;
use Classes\WaitingTimeline;
use Enums\StructureOfInputEnum;
use Enums\TypeOfInputLineEnum;
use Helpers\ArrayHelper;

require __DIR__ . '/vendor/autoload.php';


$waitingTimeline = new WaitingTimeline();

$handle = fopen("input.txt", "r");

if ($handle) {
    $currentLine = 0;
    $countOfAllLines = fgets($handle);// TODO handle and check the value of input here

    $data = [];
    for ($inputLine = 1; $inputLine <= $countOfAllLines; $inputLine++) {
        $line = fgets($handle);
        $lineValues = explode(' ', $line);

        $inputType = $lineValues[Model::INPUT_TYPE];

        if (TypeOfInputLineEnum::isQuery($inputType)) {
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

            $query = (new Query())
                ->setService($service)
                ->setVariation(is_null($variation) ? null : intval($variation))
                ->setQuestionType($questionType)
                ->setResponseType($responseType)
                ->setCategory(is_null($category) ? null : intval($category))
                ->setSubCategory(is_null($subcategory) ? null : intval($subcategory))
                ->setDateFrom($dateFrom)
                ->setDateTo(is_null($dateTo) ? null : $dateTo);

            // TODO your logic here


        } elseif (TypeOfInputLineEnum::isWaitingTime($inputType)) {

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

            $data[] = (new WaitingTimeline())
                ->setService($service)
                ->setVariation(is_null($variation) ? null : intval($variation))
                ->setQuestionType($questionType)
                ->setResponseType($responseType)
                ->setCategory(is_null($category) ? null : intval($category))
                ->setSubCategory(is_null($subcategory) ? null : intval($subcategory))
                ->setDate($date)
                ->setTime($time);


        } else {
            throw new Exception('Not supported type');
        }

    }
    /*
        foreach ($data as $item) {
            echo '<pre>';
            print_r($item);
            echo '</pre>';
        }
    */
    fclose($handle);
} else {
    echo 'Error open File';
}


