<?php

namespace Classes;

use DateTime;
use Exception;

/**
 * Class Query
 * @package Classes
 * @author Ahmed Helal Ahmed
 */
class Query extends Model
{
    const DATE_FROM = 0;
    const DATE_TO = 1;
    private $dateFrom = '';
    private $dateTo = '';

    /**
     * @return string|DateTime
     * @throws Exception
     */
    public function getDateFrom()
    {
        if ($this->dateFrom) {
            return new DateTime(str_replace('-', '.', $this->dateFrom));
        }
        return $this->dateFrom;
    }

    /**
     * @param string $dateFrom
     * @return Query
     */
    public function setDateFrom(string $dateFrom): Query
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    /**
     * @return string|DateTime
     * @throws Exception
     */
    public function getDateTo()
    {
        if ($this->dateTo) {
            return new DateTime(str_replace('.', '-', $this->dateTo));
        }
        return $this->dateTo;
    }

    /**
     * @param string|null $dateTo
     * @return Query
     */
    public function setDateTo(?string $dateTo): Query
    {
        $this->dateTo = $dateTo;
        return $this;
    }

}