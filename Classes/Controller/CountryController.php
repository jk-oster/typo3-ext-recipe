<?php

declare(strict_types=1);

namespace Jkoster\Recipies\Controller;


use Jkoster\Recipies\Domain\Model\Country;
use Jkoster\Recipies\Domain\Model\Dto\Filter;
use Jkoster\Recipies\Domain\Repository\CountryRepository;
use Jkoster\Recipies\Domain\Repository\RecipieRepository;

/**
 * This file is part of the "Recipie of the World" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Jakob Osterberger <j.osterberger98@gmx.at>, FH-Oberösterreich
 */

/**
 * CountryController
 */
class CountryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * countryRepository
     *
     * @var CountryRepository|null
     */
    protected ?CountryRepository $countryRepository = null;

    /**
     * @param CountryRepository $countryRepository
     */
    public function injectCountryRepository(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    /**
     * recipieRepository
     *
     * @var RecipieRepository|null
     */
    protected ?RecipieRepository $recipieRepository = null;

    /**
     * @param RecipieRepository $recipieRepository
     */
    public function injectRecipieRepository(RecipieRepository $recipieRepository)
    {
        $this->recipieRepository = $recipieRepository;
    }

    /**
     * initialize create action
     *
     * @return void
     */
    public function initializeListAction()
    {
        /** @var PropertyMappingConfiguration $filterConfiguration */
        $filterConfiguration = $this->arguments['filter']->getPropertyMappingConfiguration();
        $filterConfiguration->allowAllProperties();
    }

    /**
     * action list
     *
     * @return string|object|null|void
     */
    public function listAction(Filter $filter = null): void
    {
        $countryFilter = new Filter();
        if($filter) $countryFilter = $filter;
        $countries = $this->countryRepository->findByFilter($countryFilter);
        $this->view->assign('countries', $countries);
    }

    /**
     * action show
     *
     * @param Country $country
     * @return string|object|null|void
     */
    public function showAction(Country $country): void
    {
        $recipieFilter = new Filter();
        $recipieFilter->setCountry($country->getUid());
        $recipies = $this->recipieRepository->findByFilter($recipieFilter);
        $this->view->assign('recipies', $recipies);
        $this->view->assign('country', $country);
    }
}
