<?php

namespace Classes;

class Query extends Model
{
    private $dateFrom = '';
    private $dateTo = '';

    /**
     * @return string
     */
    public function getDateFrom(): string
    {
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
     * @return string|null
     */
    public function getDateTo(): ?string
    {
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