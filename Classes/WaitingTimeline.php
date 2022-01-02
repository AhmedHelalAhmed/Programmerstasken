<?php

namespace Classes;

/**
 * Class WaitingTimeline
 * @package Classes
 * @author Ahmed Helal Ahmed
 */
class WaitingTimeline extends Model
{
    private $date = '';
    private $time = 0;
    const DATE = 4;
    const TIME = 5;

    /**
     * @return string
     */
    public function getDate(): string
    {
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