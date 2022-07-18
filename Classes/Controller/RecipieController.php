<?php

declare(strict_types=1);

namespace Jkoster\Recipies\Controller;


use Jkoster\Recipies\Domain\Model\Country;
use Jkoster\Recipies\Domain\Model\Dto\Filter;
use Jkoster\Recipies\Domain\Model\Recipie;
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
 * RecipieController
 */
class RecipieController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

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
     * initialize list action
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
     * initialize list action
     *
     * @return void
     */
    public function initializeTopAction()
    {
        /** @var PropertyMappingConfiguration $filterConfiguration */
        $filterConfiguration = $this->arguments['country']->getPropertyMappingConfiguration();
        $filterConfiguration->allowAllProperties();
    }

    /**
     * initialize list action
     *
     * @return void
     */
    public function initializeVeganAction()
    {
        /** @var PropertyMappingConfiguration $filterConfiguration */
        $filterConfiguration = $this->arguments['country']->getPropertyMappingConfiguration();
        $filterConfiguration->allowAllProperties();
    }

    /**
     * initialize list action
     *
     * @return void
     */
    public function initializeFastAction()
    {
        /** @var PropertyMappingConfiguration $filterConfiguration */
        $filterConfiguration = $this->arguments['country']->getPropertyMappingConfiguration();
        $filterConfiguration->allowAllProperties();
    }

    /**
     * action list
     *
     * @return string|object|null|void
     */
    public function listAction(Filter $filter = null): void
    {
        $recipieFilter = $filter ?: new Filter();
        $allRecipies = $this->recipieRepository->findByFilter($recipieFilter);
        $this->view->assign('recipies', $allRecipies);
        // Configuration for filter Form in Frontend
        $frontendFilter = [];
        $frontendFilter['countries'] = $this->countryRepository->findAll();
        $frontendFilter['preparationTimes'] = $this->settings['preparationTimes'];
        $frontendFilter['filter'] = $filter;
        $this->view->assign('filterSettings', $frontendFilter);
    }

    /**
     * action show
     *
     * @param Recipie $recipie
     * @return string|object|null|void
     */
    public function showAction(Recipie $recipie): void
    {
        $this->view->assign('recipie', $recipie);
    }

    /**
     * action top
     *
     * @return string|object|null|void
     */
    public function topAction(Country $country = null): void
    {
        debug($country);
        $topFilter = $this->getTopFilter($country);
        $recipies = $this->recipieRepository->findByFilter($topFilter);
        $this->view->assign('recipies', $recipies);
        $this->view->assign('country', $country);
    }

    protected function getTopFilter(Country $country = null): Filter
    {
        $topFilter = new Filter();
        if($country) $topFilter->setCountry($country->getUid());
        $topFilter->setRating((int)($this->settings['filter']['rating'] ?? 5));
        return $topFilter;
    }

    /**
     * action vegan
     *
     * @return string|object|null|void
     */
    public function veganAction(Country $country = null): void
    {
        $veganFilter = $this->getVeganFilter($country);
        $recipies = $this->recipieRepository->findByFilter($veganFilter);
        $this->view->assign('recipies', $recipies);
        $this->view->assign('country', $country);
    }

    protected function getVeganFilter(Country $country = null): Filter
    {
        $veganFilter = new Filter();
        if($country) $veganFilter->setCountry($country->getUid());
        $veganFilter->setVegan((bool)($this->settings['filter']['vegan'] ?? true));
        return $veganFilter;
    }

    /**
     * action fast
     *
     * @return string|object|null|void
     */
    public function fastAction(Country $country = null): void
    {
        $fastFilter = $this->getFastFilter($country);
        $recipies = $this->recipieRepository->findByFilter($fastFilter);
        $this->view->assign('recipies', $recipies);
        $this->view->assign('country', $country);
    }

    protected function getFastFilter(Country $country = null): Filter
    {
        $fastFilter = new Filter();
        if($country) $fastFilter->setCountry($country->getUid());
        $fastFilter->setPreparationTime((int)($this->settings['filter']['preparationTime'] ?? 30));
        return $fastFilter;
    }
}
