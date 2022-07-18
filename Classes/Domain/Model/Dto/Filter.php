<?php
declare(strict_types=1);

namespace Jkoster\Recipies\Domain\Model\Dto;

class Filter
{
    protected int $rating = 0;

    protected bool $vegan = false;

    protected int $preparationTime = 0;

    protected int $country = 0;

    protected int $id = 0;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getCountry(): int
    {
        return $this->country;
    }

    /**
     * @param int $country
     */
    public function setCountry(int $country): void
    {
        $this->country = $country;
    }

    /**
     * @return int
     */
    public function getRating(): int
    {
        return $this->rating;
    }

    /**
     * @param int $rating
     */
    public function setRating(int $rating): void
    {
        $this->rating = $rating;
    }

    /**
     * @return bool
     */
    public function isVegan(): bool
    {
        return $this->vegan;
    }

    /**
     * @param bool $vegan
     */
    public function setVegan(bool $vegan): void
    {
        $this->vegan = $vegan;
    }

    /**
     * @return int
     */
    public function getPreparationTime(): int
    {
        return $this->preparationTime;
    }

    /**
     * @param int $preparationTime
     */
    public function setPreparationTime(int $preparationTime): void
    {
        $this->preparationTime = $preparationTime;
    }


}