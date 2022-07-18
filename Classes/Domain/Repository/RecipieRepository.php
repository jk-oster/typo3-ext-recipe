<?php

declare(strict_types=1);

namespace Jkoster\Recipies\Domain\Repository;


use Jkoster\Recipies\Domain\Model\Dto\Filter;

/**
 * This file is part of the "Recipie of the World" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Jakob Osterberger <j.osterberger98@gmx.at>, FH-Oberösterreich
 */

/**
 * The repository for Recipies
 */
class RecipieRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function findByFilter(Filter $filter)
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);

        $constraints = [];
        if ($filter->getId()) {
            $constraints[] = $query->equals('uid', $filter->getId());
        }
        if ($filter->getPreparationTime()) {
            $constraints[] = $query->lessThanOrEqual('preparationTime', $filter->getPreparationTime());
        }
        if ($filter->getRating()) {
            $constraints[] = $query->greaterThanOrEqual('rating', $filter->getRating());
        }
        if ($filter->isVegan()) {
            $constraints[] = $query->equals('vegan', $filter->isVegan());
        }
        if ($filter->getCountry()) {
            $constraints[] = $query->equals('countries.uid', $filter->getCountry());
        }
        if (!empty($constraints)) {
            $query->matching($query->logicalAnd($constraints));
        }

        return $query->execute();
    }
}
