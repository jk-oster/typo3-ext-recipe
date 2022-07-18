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
class CountryTest extends UnitTestCase
{
    /**
     * @var \Jkoster\Recipies\Domain\Model\Country|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Jkoster\Recipies\Domain\Model\Country::class,
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
    public function getFlagReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getFlag()
        );
    }

    /**
     * @test
     */
    public function setFlagForFileReferenceSetsFlag(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setFlag($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('flag'));
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
}
