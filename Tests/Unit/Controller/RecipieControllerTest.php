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
class RecipieControllerTest extends UnitTestCase
{
    /**
     * @var \Jkoster\Recipies\Controller\RecipieController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Jkoster\Recipies\Controller\RecipieController::class))
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
    public function listActionFetchesAllRecipiesFromRepositoryAndAssignsThemToView(): void
    {
        $allRecipies = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $recipieRepository = $this->getMockBuilder(\Jkoster\Recipies\Domain\Repository\RecipieRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $recipieRepository->expects(self::once())->method('findAll')->will(self::returnValue($allRecipies));
        $this->subject->_set('recipieRepository', $recipieRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('recipies', $allRecipies);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenRecipieToView(): void
    {
        $recipie = new \Jkoster\Recipies\Domain\Model\Recipie();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('recipie', $recipie);

        $this->subject->showAction($recipie);
    }
}
