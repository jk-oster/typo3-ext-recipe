<?php

declare(strict_types=1);

namespace Jkoster\Recipies\Tests\Functional;

use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * Test case
 *
 * @author Jakob Osterberger <j.osterberger98@gmx.at>
 */
class BasicTest extends FunctionalTestCase
{
    /**
     * @var array
     */
    protected $testExtensionsToLoad = [
        'typo3conf/ext/recipies',
    ];

    /**
     * Just a dummy to show that at least one test is actually executed
     *
     * @test
     */
    public function dummy(): void
    {
        $this->assertTrue(true);
    }
}
