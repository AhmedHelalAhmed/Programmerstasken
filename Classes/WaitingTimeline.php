<?php

namespace Classes;

use DateTime;
use Exception;

/**
 * Class WaitingTimeline
 * @package Classes
 * @author Ahmed Helal Ahmed
 */
class WaitingTimeline extends Model
{
    const DATE = 4;
    const TIME = 5;
    private $date = '';
    private $time = 0;

    /**
     * @return DateTime| string
     * @throws Exception
     */
    public function getDate()
    {
        if ($this->date) {
            return new DateTime(str_replace('.', '-', $this->date));
        }
        return $this->date;
    }

    /**
     * @param string $date
     * @return WaitingTimeline
     */
    public function setDate(string $date): WaitingTimeline
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return int
     */
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * @param int $time
     * @return WaitingTimeline
     */
    public function setTime(int $time): WaitingTimeline
    {
        $this->time = $time;
        return $this;
    }
}