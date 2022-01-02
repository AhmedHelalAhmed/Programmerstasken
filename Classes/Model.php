<?php

namespace Classes;

/**
 * Class Model
 * @package Classes
 * @author Ahmed Helal Ahmed
 */
abstract class Model
{
    private $service;
    private $variation = 0;
    private $questionType;
    private $category = 0;
    private $subCategory = 0;
    private $responseType = '';


    public function getService()
    {
        return $this->service;
    }


    public function setService($service): self
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
     * @return self
     */
    public function setVariation(?int $variation): self
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
     * @return self
     */
    public function setCategory(?int $category): self
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
     * @return self
     */
    public function setSubCategory(?int $subCategory): self
    {
        $this->subCategory = $subCategory;
        return $this;
    }

    public function getQuestionType()
    {
        return $this->questionType;
    }

    public function setQuestionType($questionType): self
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
     * @return self
     */
    public function setResponseType(string $responseType): self
    {
        $this->responseType = $responseType;
        return $this;
    }
}