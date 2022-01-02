<?php

namespace Services;

/**
 * Class GettingFileForReadService
 * @package Services
 * @author Ahmed Helal Ahmed
 */
class GettingFileForReadService
{
    /**
     * @param $path
     * @return false|resource
     * @throws \Exception
     */
    public function execute($path)
    {
        if (!file_exists($path)) {
            throw new \Exception('Input file not found');
        }
        return fopen($path, "r");
    }
}