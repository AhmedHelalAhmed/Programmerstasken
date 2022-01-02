<?php

namespace Enums;

/**
 * Class TypeOfWaitingTimeline
 * @package Enums
 * @author Ahmed Helal Ahmed
 */
class TypeOfWaitingTimeline
{
    const FIRST_ANSWER = 'P';
    const NEXT_ANSWER = 'N';


    // TODO use this in validating input
    const ALLOWED_TYPES = [
        self::FIRST_ANSWER,
        self::NEXT_ANSWER
    ];
}