<?php

namespace Enums;

/**
 * Class TypeOfInputLineEnum
 * @package Enums
 * @author Ahmed Helal Ahmed
 */
class TypeOfInputLineEnum
{
    const WAITING_TIMELINE = 'C';
    const QUERY = 'D';

    const ALLOWED_TYPES = [
        self::WAITING_TIMELINE,
        self::QUERY
    ];

    public static function isQuery($type)
    {
        return $type === self::QUERY;
    }
}