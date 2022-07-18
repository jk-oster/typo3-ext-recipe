<?php
defined('TYPO3_MODE') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Recipies',
        'Default',
        [
            \Jkoster\Recipies\Controller\RecipieController::class => 'list, show'
        ],
        // non-cacheable actions
        [
            \Jkoster\Recipies\Controller\RecipieController::class => 'list',
            \Jkoster\Recipies\Controller\CountryController::class => 'list'
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Recipies',
        'Countries',
        [
            \Jkoster\Recipies\Controller\CountryController::class => 'list, show'
        ],
        // non-cacheable actions
        [
            \Jkoster\Recipies\Controller\RecipieController::class => 'list',
            \Jkoster\Recipies\Controller\CountryController::class => 'list'
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Recipies',
        'Top',
        [
            \Jkoster\Recipies\Controller\RecipieController::class => 'top, show'
        ],
        // non-cacheable actions
        [
            \Jkoster\Recipies\Controller\RecipieController::class => '',
            \Jkoster\Recipies\Controller\CountryController::class => ''
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Recipies',
        'Vegan',
        [
            \Jkoster\Recipies\Controller\RecipieController::class => 'vegan, show'
        ],
        // non-cacheable actions
        [
            \Jkoster\Recipies\Controller\RecipieController::class => '',
            \Jkoster\Recipies\Controller\CountryController::class => ''
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Recipies',
        'Fast',
        [
            \Jkoster\Recipies\Controller\RecipieController::class => 'fast, show'
        ],
        // non-cacheable actions
        [
            \Jkoster\Recipies\Controller\RecipieController::class => '',
            \Jkoster\Recipies\Controller\CountryController::class => ''
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    default {
                        iconIdentifier = recipies-plugin-default
                        title = LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_default.name
                        description = LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_default.description
                        tt_content_defValues {
                            CType = list
                            list_type = recipies_default
                        }
                    }
                    countries {
                        iconIdentifier = recipies-plugin-countries
                        title = LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_countries.name
                        description = LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_countries.description
                        tt_content_defValues {
                            CType = list
                            list_type = recipies_countries
                        }
                    }
                    top {
                        iconIdentifier = recipies-plugin-top
                        title = LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_top.name
                        description = LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_top.description
                        tt_content_defValues {
                            CType = list
                            list_type = recipies_top
                        }
                    }
                    vegan {
                        iconIdentifier = recipies-plugin-vegan
                        title = LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_vegan.name
                        description = LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_vegan.description
                        tt_content_defValues {
                            CType = list
                            list_type = recipies_vegan
                        }
                    }
                    fast {
                        iconIdentifier = recipies-plugin-fast
                        title = LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_fast.name
                        description = LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_fast.description
                        tt_content_defValues {
                            CType = list
                            list_type = recipies_fast
                        }
                    }
                }
                show = *
            }
       }'
    );

    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'recipies-plugin-default',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:recipies/Resources/Public/Icons/user_plugin_default.svg']
    );
    $iconRegistry->registerIcon(
        'recipies-plugin-countries',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:recipies/Resources/Public/Icons/user_plugin_countries.svg']
    );
    $iconRegistry->registerIcon(
        'recipies-plugin-top',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:recipies/Resources/Public/Icons/user_plugin_top.svg']
    );
    $iconRegistry->registerIcon(
        'recipies-plugin-vegan',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:recipies/Resources/Public/Icons/user_plugin_vegan.svg']
    );
    $iconRegistry->registerIcon(
        'recipies-plugin-fast',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:recipies/Resources/Public/Icons/user_plugin_fast.svg']
    );
})();
