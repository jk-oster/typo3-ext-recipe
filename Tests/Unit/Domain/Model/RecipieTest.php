<?php

declare(strict_types=1);

namespace Jkoster\Recipies\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Jakob Osterberger <j.osterberger98@gmx.at>
 */
class RecipieTest extends UnitTestCase
{
    /**
     * @var \Jkoster\Recipies\Domain\Model\Recipie|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Jkoster\Recipies\Domain\Model\Recipie::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle(): void
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('title'));
    }

    /**
     * @test
     */
    public function getAuthorReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getAuthor()
        );
    }

    /**
     * @test
     */
    public function setAuthorForStringSetsAuthor(): void
    {
        $this->subject->setAuthor('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('author'));
    }

    /**
     * @test
     */
    public function getRatingReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getRating()
        );
    }

    /**
     * @test
     */
    public function setRatingForIntSetsRating(): void
    {
        $this->subject->setRating(12);

        self::assertEquals(12, $this->subject->_get('rating'));
    }

    /**
     * @test
     */
    public function getVegetarianReturnsInitialValueForBool(): void
    {
        self::assertFalse($this->subject->getVegetarian());
    }

    /**
     * @test
     */
    public function setVegetarianForBoolSetsVegetarian(): void
    {
        $this->subject->setVegetarian(true);

        self::assertEquals(true, $this->subject->_get('vegetarian'));
    }

    /**
     * @test
     */
    public function getVeganReturnsInitialValueForBool(): void
    {
        self::assertFalse($this->subject->getVegan());
    }

    /**
     * @test
     */
    public function setVeganForBoolSetsVegan(): void
    {
        $this->subject->setVegan(true);

        self::assertEquals(true, $this->subject->_get('vegan'));
    }

    /**
     * @test
     */
    public function getTeaserReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTeaser()
        );
    }

    /**
     * @test
     */
    public function setTeaserForStringSetsTeaser(): void
    {
        $this->subject->setTeaser('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('teaser'));
    }

    /**
     * @test
     */
    public function getMediaReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getMedia()
        );
    }

    /**
     * @test
     */
    public function setMediaForFileReferenceSetsMedia(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setMedia($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('media'));
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription(): void
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('description'));
    }

    /**
     * @test
     */
    public function getPreparationReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getPreparation()
        );
    }

    /**
     * @test
     */
    public function setPreparationForStringSetsPreparation(): void
    {
        $this->subject->setPreparation('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('preparation'));
    }

    /**
     * @test
     */
    public function getPortionsReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getPortions()
        );
    }

    /**
     * @test
     */
    public function setPortionsForIntSetsPortions(): void
    {
        $this->subject->setPortions(12);

        self::assertEquals(12, $this->subject->_get('portions'));
    }

    /**
     * @test
     */
    public function getPreparationTimeReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getPreparationTime()
        );
    }

    /**
     * @test
     */
    public function setPreparationTimeForIntSetsPreparationTime(): void
    {
        $this->subject->setPreparationTime(12);

        self::assertEquals(12, $this->subject->_get('preparationTime'));
    }

    /**
     * @test
     */
    public function getCaloriesReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getCalories()
        );
    }

    /**
     * @test
     */
    public function setCaloriesForIntSetsCalories(): void
    {
        $this->subject->setCalories(12);

        self::assertEquals(12, $this->subject->_get('calories'));
    }

    /**
     * @test
     */
    public function getCountriesReturnsInitialValueForCountry(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getCountries()
        );
    }

    /**
     * @test
     */
    public function setCountriesForObjectStorageContainingCountrySetsCountries(): void
    {
        $country = new \Jkoster\Recipies\Domain\Model\Country();
        $objectStorageHoldingExactlyOneCountries = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneCountries->attach($country);
        $this->subject->setCountries($objectStorageHoldingExactlyOneCountries);

        self::assertEquals($objectStorageHoldingExactlyOneCountries, $this->subject->_get('countries'));
    }

    /**
     * @test
     */
    public function addCountryToObjectStorageHoldingCountries(): void
    {
        $country = new \Jkoster\Recipies\Domain\Model\Country();
        $countriesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $countriesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($country));
        $this->subject->_set('countries', $countriesObjectStorageMock);

        $this->subject->addCountry($country);
    }

    /**
     * @test
     */
    public function removeCountryFromObjectStorageHoldingCountries(): void
    {
        $country = new \Jkoster\Recipies\Domain\Model\Country();
        $countriesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $countriesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($country));
        $this->subject->_set('countries', $countriesObjectStorageMock);

        $this->subject->removeCountry($country);
    }

    /**
     * @test
     */
    public function getReviewsReturnsInitialValueForReview(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getReviews()
        );
    }

    /**
     * @test
     */
    public function setReviewsForObjectStorageContainingReviewSetsReviews(): void
    {
        $review = new \Jkoster\Recipies\Domain\Model\Review();
        $objectStorageHoldingExactlyOneReviews = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneReviews->attach($review);
        $this->subject->setReviews($objectStorageHoldingExactlyOneReviews);

        self::assertEquals($objectStorageHoldingExactlyOneReviews, $this->subject->_get('reviews'));
    }

    /**
     * @test
     */
    public function addReviewToObjectStorageHoldingReviews(): void
    {
        $review = new \Jkoster\Recipies\Domain\Model\Review();
        $reviewsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $reviewsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($review));
        $this->subject->_set('reviews', $reviewsObjectStorageMock);

        $this->subject->addReview($review);
    }

    /**
     * @test
     */
    public function removeReviewFromObjectStorageHoldingReviews(): void
    {
        $review = new \Jkoster\Recipies\Domain\Model\Review();
        $reviewsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $reviewsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($review));
        $this->subject->_set('reviews', $reviewsObjectStorageMock);

        $this->subject->removeReview($review);
    }
}
