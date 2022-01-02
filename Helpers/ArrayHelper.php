<?php

namespace Helpers;

/**
 * Class ArrayHelper
 * @package Helpers
 * @author Ahmed Helal Ahmed
 */
class ArrayHelper
{
    /**
     * @param int $index
     * @param $context
     * @return mixed|null
     */
    public static function getValueOfIndex(int $index, $context)
    {
        return $context[$index] ?? null;
    }
}