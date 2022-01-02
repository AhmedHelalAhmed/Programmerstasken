<?php

namespace Helpers;

class ArrayHelper
{
    public static function getValueOfIndex(int $index, $context)
    {
        return $context[$index] ?? null;
    }
}