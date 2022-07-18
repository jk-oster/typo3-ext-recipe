<?php
defined('TYPO3_MODE') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Recipies',
    'Default',
    'Recipies'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Recipies',
    'Countries',
    'Countries'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Recipies',
    'Top',
    'Top Recipies'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Recipies',
    'Vegan',
    'Vegan Recipies'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Recipies',
    'Fast',
    'Fast Recipies'
);
