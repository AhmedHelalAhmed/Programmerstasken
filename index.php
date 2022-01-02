<?php


use Services\PrintingAverageWaitingTimeService;

require __DIR__ . '/vendor/autoload.php';

try {
    (new PrintingAverageWaitingTimeService)->execute('inputt.txt');

} catch (\Exception $e) {
    // report to loggers
    echo 'Error message ' . $e->getMessage() . PHP_EOL;

}


