<?php

declare(strict_types=1);

namespace Jkoster\Recipies\Domain\Repository;


/**
 * This file is part of the "Recipie of the World" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Jakob Osterberger <j.osterberger98@gmx.at>, FH-Oberösterreich
 */

/**
 * The repository for Countries
 */
class CountryRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * Returns all objects of this repository.
     *
     * @return QueryResultInterface|array
     */
    public function findAll()
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        return $query->execute();
    }

}
