<?php

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

        $inputType = $lineValues[StructureOfInputEnum::INPUT_TYPE];

        if (TypeOfInputLineEnum::isQuery($inputType)) {

//            var_dump('Query');
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
            $service = ArrayHelper::getValueOfIndex(StructureOfInputEnum::SERVICE, $serviceVariationValues);
            $variation = ArrayHelper::getValueOfIndex(StructureOfInputEnum::VARIATION, $serviceVariationValues);
            $questionType = ArrayHelper::getValueOfIndex(StructureOfInputEnum::QUESTION_TYPE,
                $questionTypeAndCategoryAndSubcategoryValues);
            $category = ArrayHelper::getValueOfIndex(StructureOfInputEnum::CATEGORY,
                $questionTypeAndCategoryAndSubcategoryValues);
            $subcategory = ArrayHelper::getValueOfIndex(StructureOfInputEnum::SUBCATEGORY,
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

    foreach ($data as $item) {
        echo '<pre>';
        print_r($item);
        echo '</pre>';
    }

    fclose($handle);
} else {
    echo 'Error open File';
}


