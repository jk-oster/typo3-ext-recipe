<?php
defined('TYPO3_MODE') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_recipies_domain_model_recipie', 'EXT:recipies/Resources/Private/Language/locallang_csh_tx_recipies_domain_model_recipie.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_recipies_domain_model_recipie');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_recipies_domain_model_country', 'EXT:recipies/Resources/Private/Language/locallang_csh_tx_recipies_domain_model_country.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_recipies_domain_model_country');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_recipies_domain_model_review', 'EXT:recipies/Resources/Private/Language/locallang_csh_tx_recipies_domain_model_review.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_recipies_domain_model_review');
})();
