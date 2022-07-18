<?php

declare(strict_types=1);

namespace Jkoster\Recipies\Domain\Model;


/**
 * This file is part of the "Recipie of the World" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * Recipie
 */
class Recipie extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * author
     *
     * @var string
     */
    protected $author = '';

    /**
     * rating
     *
     * @var int
     */
    protected $rating = 0;

    /**
     * vegetarian
     *
     * @var bool
     */
    protected $vegetarian = false;

    /**
     * vegan
     *
     * @var bool
     */
    protected $vegan = false;

    /**
     * teaser
     *
     * @var string
     */
    protected $teaser = '';

    /**
     * media
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $media = null;

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * preparation
     *
     * @var string
     */
    protected $preparation = '';

    /**
     * portions
     *
     * @var int
     */
    protected $portions = 0;

    /**
     * preparationTime
     *
     * @var int
     */
    protected $preparationTime = 0;

    /**
     * calories
     *
     * @var int
     */
    protected $calories = 0;

    /**
     * countries
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Jkoster\Recipies\Domain\Model\Country>
     */
    protected $countries = null;

    /**
     * reviews
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Jkoster\Recipies\Domain\Model\Review>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $reviews = null;

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->countries = $this->countries ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->reviews = $this->reviews ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns the author
     *
     * @return string $author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the author
     *
     * @param string $author
     * @return void
     */
    public function setAuthor(string $author)
    {
        $this->author = $author;
    }

    /**
     * Returns the rating
     *
     * @return int $rating
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Sets the rating
     *
     * @param int $rating
     * @return void
     */
    public function setRating(int $rating)
    {
        $this->rating = $rating;
    }

    /**
     * Returns the vegetarian
     *
     * @return bool $vegetarian
     */
    public function getVegetarian()
    {
        return $this->vegetarian;
    }

    /**
     * Sets the vegetarian
     *
     * @param bool $vegetarian
     * @return void
     */
    public function setVegetarian(bool $vegetarian)
    {
        $this->vegetarian = $vegetarian;
    }

    /**
     * Returns the boolean state of vegetarian
     *
     * @return bool
     */
    public function isVegetarian()
    {
        return $this->vegetarian;
    }

    /**
     * Returns the vegan
     *
     * @return bool $vegan
     */
    public function getVegan()
    {
        return $this->vegan;
    }

    /**
     * Sets the vegan
     *
     * @param bool $vegan
     * @return void
     */
    public function setVegan(bool $vegan)
    {
        $this->vegan = $vegan;
    }

    /**
     * Returns the boolean state of vegan
     *
     * @return bool
     */
    public function isVegan()
    {
        return $this->vegan;
    }

    /**
     * Returns the teaser
     *
     * @return string $teaser
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * Sets the teaser
     *
     * @param string $teaser
     * @return void
     */
    public function setTeaser(string $teaser)
    {
        $this->teaser = $teaser;
    }

    /**
     * Returns the media
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Sets the media
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $media
     * @return void
     */
    public function setMedia(\TYPO3\CMS\Extbase\Domain\Model\FileReference $media)
    {
        $this->media = $media;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns the preparation
     *
     * @return string $preparation
     */
    public function getPreparation()
    {
        return $this->preparation;
    }

    /**
     * Sets the preparation
     *
     * @param string $preparation
     * @return void
     */
    public function setPreparation(string $preparation)
    {
        $this->preparation = $preparation;
    }

    /**
     * Returns the portions
     *
     * @return int $portions
     */
    public function getPortions()
    {
        return $this->portions;
    }

    /**
     * Sets the portions
     *
     * @param int $portions
     * @return void
     */
    public function setPortions(int $portions)
    {
        $this->portions = $portions;
    }

    /**
     * Returns the preparationTime
     *
     * @return int $preparationTime
     */
    public function getPreparationTime()
    {
        return $this->preparationTime;
    }

    /**
     * Sets the preparationTime
     *
     * @param int $preparationTime
     * @return void
     */
    public function setPreparationTime(int $preparationTime)
    {
        $this->preparationTime = $preparationTime;
    }

    /**
     * Returns the calories
     *
     * @return int $calories
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * Sets the calories
     *
     * @param int $calories
     * @return void
     */
    public function setCalories(int $calories)
    {
        $this->calories = $calories;
    }

    /**
     * Adds a Country
     *
     * @param \Jkoster\Recipies\Domain\Model\Country $country
     * @return void
     */
    public function addCountry(\Jkoster\Recipies\Domain\Model\Country $country)
    {
        $this->countries->attach($country);
    }

    /**
     * Removes a Country
     *
     * @param \Jkoster\Recipies\Domain\Model\Country $countryToRemove The Country to be removed
     * @return void
     */
    public function removeCountry(\Jkoster\Recipies\Domain\Model\Country $countryToRemove)
    {
        $this->countries->detach($countryToRemove);
    }

    /**
     * Returns the countries
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Jkoster\Recipies\Domain\Model\Country> $countries
     */
    public function getCountries()
    {
        return $this->countries;
    }

    /**
     * Sets the countries
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Jkoster\Recipies\Domain\Model\Country> $countries
     * @return void
     */
    public function setCountries(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $countries)
    {
        $this->countries = $countries;
    }

    /**
     * Adds a Review
     *
     * @param \Jkoster\Recipies\Domain\Model\Review $review
     * @return void
     */
    public function addReview(\Jkoster\Recipies\Domain\Model\Review $review)
    {
        $this->reviews->attach($review);
    }

    /**
     * Removes a Review
     *
     * @param \Jkoster\Recipies\Domain\Model\Review $reviewToRemove The Review to be removed
     * @return void
     */
    public function removeReview(\Jkoster\Recipies\Domain\Model\Review $reviewToRemove)
    {
        $this->reviews->detach($reviewToRemove);
    }

    /**
     * Returns the reviews
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Jkoster\Recipies\Domain\Model\Review> $reviews
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * Sets the reviews
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Jkoster\Recipies\Domain\Model\Review> $reviews
     * @return void
     */
    public function setReviews(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $reviews)
    {
        $this->reviews = $reviews;
    }
}
