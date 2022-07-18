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
class ReviewTest extends UnitTestCase
{
    /**
     * @var \Jkoster\Recipies\Domain\Model\Review|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Jkoster\Recipies\Domain\Model\Review::class,
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
    public function getDateReturnsInitialValueForDateTime(): void
    {
        self::assertEquals(
            null,
            $this->subject->getDate()
        );
    }

    /**
     * @test
     */
    public function setDateForDateTimeSetsDate(): void
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDate($dateTimeFixture);

        self::assertEquals($dateTimeFixture, $this->subject->_get('date'));
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
}
