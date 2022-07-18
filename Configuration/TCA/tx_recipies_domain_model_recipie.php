<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_domain_model_recipie',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,author,teaser,description,preparation',
        'iconfile' => 'EXT:recipies/Resources/Public/Icons/tx_recipies_domain_model_recipie.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'title, author, rating, vegetarian, vegan, teaser, media, description, preparation, portions, preparation_time, calories, countries, reviews, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_recipies_domain_model_recipie',
                'foreign_table_where' => 'AND {#tx_recipies_domain_model_recipie}.{#pid}=###CURRENT_PID### AND {#tx_recipies_domain_model_recipie}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_domain_model_recipie.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'author' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_domain_model_recipie.author',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'rating' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_domain_model_recipie.rating',
            'config' => [
                'type' => 'input',
                'size' => 10,
                'eval' => 'trim,int',
                'range' => [
                    'lower' => 0,
                    'upper' => 5,
                ],
                'default' => 3,
                'slider' => [
                    'step' => 1,
                    'width' => 200,
                ],
            ],
        ],
        'vegetarian' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_domain_model_recipie.vegetarian',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                    ]
                ],
                'default' => 0,
            ]
        ],
        'vegan' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_domain_model_recipie.vegan',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                    ]
                ],
                'default' => 0,
            ]
        ],
        'teaser' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_domain_model_recipie.teaser',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 3,
                'eval' => 'trim',
                'default' => ''
            ]
        ],
        'media' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_domain_model_recipie.media',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'media',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ]
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'media',
                        'tablenames' => 'tx_recipies_domain_model_recipie',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 20
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
            
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_domain_model_recipie.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            
        ],
        'preparation' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_domain_model_recipie.preparation',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            
        ],
        'portions' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_domain_model_recipie.portions',
            'config' => [
                'type' => 'input',
                'size' => 10,
                'eval' => 'trim,int',
                'range' => [
                    'lower' => 0,
                    'upper' => 10,
                ],
                'default' => 2,
                'slider' => [
                    'step' => 1,
                    'width' => 200,
                ],
            ],
        ],
        'preparation_time' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_domain_model_recipie.preparation_time',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int',
                'default' => 0
            ]
        ],
        'calories' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_domain_model_recipie.calories',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int',
                'default' => 0
            ]
        ],
        'countries' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_domain_model_recipie.countries',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_recipies_domain_model_country',
                'MM' => 'tx_recipies_recipie_country_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
            
        ],
        'reviews' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipies/Resources/Private/Language/locallang_db.xlf:tx_recipies_domain_model_recipie.reviews',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_recipies_domain_model_review',
                'foreign_field' => 'recipie',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],

        ],
    
    ],
];
