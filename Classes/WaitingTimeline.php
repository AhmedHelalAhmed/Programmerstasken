<?php

namespace Classes;

/**
 * Class WaitingTimeline
 * @package Classes
 * @author Ahmed Helal Ahmed
 */
class WaitingTimeline
{
    private $service = 0;
    private $variation = 0;
    private $questionType = 0;
    private $category = 0;
    private $subCategory = 0;
    private $responseType = '';
    private $date = '';
    private $time = 0;

    /**
     * @return int
     */
    public function getService(): int
    {
        return $this->service;
    }

    /**
     * @param int $service
     * @return WaitingTimeline
     */
    public function setService(int $service): WaitingTimeline
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return int | null
     */
    public function getVariation(): ?int
    {
        return $this->variation;
    }

    /**
     * @param int|null $variation
     * @return WaitingTimeline
     */
    public function setVariation(?int $variation): WaitingTimeline
    {
        $this->variation = $variation;
        return $this;
    }


    /**
     * @return int|null
     */
    public function getCategory(): ?int
    {
        return $this->category;
    }

    /**
     * @param int|null $category
     * @return WaitingTimeline
     */
    public function setCategory(?int $category): WaitingTimeline
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSubCategory(): ?int
    {
        return $this->subCategory;
    }

    /**
     * @param int|null $subCategory
     * @return WaitingTimeline
     */
    public function setSubCategory(?int $subCategory): WaitingTimeline
    {
        $this->subCategory = $subCategory;
        return $this;
    }

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

    /**
     * @return int
     */
    public function getQuestionType(): int
    {
        return $this->questionType;
    }

    /**
     * @param int $questionType
     * @return WaitingTimeline
     */
    public function setQuestionType(int $questionType): WaitingTimeline
    {
        $this->questionType = $questionType;
        return $this;
    }

    /**
     * @return string
     */
    public function getResponseType(): string
    {
        return $this->responseType;
    }

    /**
     * @param string $responseType
     * @return WaitingTimeline
     */
    public function setResponseType(string $responseType): WaitingTimeline
    {
        $this->responseType = $responseType;
        return $this;
    }


}