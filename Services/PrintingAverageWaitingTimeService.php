<?php

namespace Services;

use Classes\Model;
use Classes\WaitingTimeline;
use Enums\TypeOfInputLineEnum;
use Exception;

/**
 * Class PrintingAverageWaitingTimeService
 * @package Services
 * @author Ahmed Helal Ahmed
 */
class PrintingAverageWaitingTimeService
{

    const MAX_LINES_COUNT = 100;
    private $data = [];

    public function execute(string $filePath)
    {
        try {
            $handle = (new GettingFileForReadService())->execute($filePath);

            if (!$handle) {
                throw new \Exception('Unable to open File');
            }

            $countOfAllLines = intval(fgets($handle));

            if ($countOfAllLines > self::MAX_LINES_COUNT) {
                throw new \Exception('Max Lines count id ' . self::MAX_LINES_COUNT);
            }

            for ($inputLine = 1; $inputLine <= $countOfAllLines; $inputLine++) {
                $line = fgets($handle);
                $lineValues = explode(' ', $line);
                $inputType = $lineValues[Model::INPUT_TYPE];

                if (!in_array($inputType, TypeOfInputLineEnum::ALLOWED_TYPES)) {
                    throw new Exception('Not supported type');
                }

                if (TypeOfInputLineEnum::isQuery($inputType)) {
                    $query = (new BuildingQueryService())->execute($lineValues);

                    echo $this->calculateAverageTime($query) . PHP_EOL;// command line
//                echo $this->calculateAverageTime($query) . '<br>';// web

                } else {
                    $this->data[] = (new BuildingWaitingTimelineService())->execute($lineValues);
                }

            }

        } finally {

            if (isset($handle)) {
                fclose($handle);
            }

        }

    }

    /**
     * @param $query
     * @return string
     * @throws Exception
     */
    private function calculateAverageTime($query)
    {
        $dataFiltered = (new FilteringDataByQueryService())->execute($this->data, $query);
        if ($count = count($dataFiltered)) {
            return array_sum(array_map(function (WaitingTimeline $waitingTimeline) {
                    return $waitingTimeline->getTime();
                }, $dataFiltered)) / $count . PHP_EOL;
        }
        return '-';

    }
}