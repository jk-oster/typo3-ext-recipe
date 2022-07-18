<?php

declare(strict_types=1);

namespace Jkoster\Recipies\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Jakob Osterberger <j.osterberger98@gmx.at>
 */
class CountryControllerTest extends UnitTestCase
{
    /**
     * @var \Jkoster\Recipies\Controller\CountryController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Jkoster\Recipies\Controller\CountryController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllCountriesFromRepositoryAndAssignsThemToView(): void
    {
        $allCountries = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $countryRepository = $this->getMockBuilder(\Jkoster\Recipies\Domain\Repository\CountryRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $countryRepository->expects(self::once())->method('findAll')->will(self::returnValue($allCountries));
        $this->subject->_set('countryRepository', $countryRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('countries', $allCountries);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenCountryToView(): void
    {
        $country = new \Jkoster\Recipies\Domain\Model\Country();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('country', $country);

        $this->subject->showAction($country);
    }
}
