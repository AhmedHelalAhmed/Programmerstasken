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

    // TODO use this in validating input
    const ALLOWED_TYPES = [
        self::WAITING_TIMELINE,
        self::QUERY
    ];

    public static function isQuery($type)
    {
        return $type === self::QUERY;
    }

    public static function isWaitingTime($type)
    {
        return $type === self::WAITING_TIMELINE;
    }
}