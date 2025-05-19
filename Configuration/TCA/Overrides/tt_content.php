<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

use Letsweb\ContainerManageChildren\Tca\ChildrenContentElements;

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'tt_content',
    [
        'container_children' => [
            'exclude' => true,
            'label' => 'LLL:EXT:container_manage_children/Resources/Private/Language/locallang.xlf:children_elements',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tt_content',
                'foreign_table_where' => 'AND tt_content.deleted = 0 ' .
                    'and tt_content.hidden = 0 ' .
                    'and tt_content.sys_language_uid in (-1,0)',
                'foreign_field' => 'tx_container_parent',
                'foreign_sortby' => 'sorting',
                'maxitems' => 1000,
                'appearance' => [
                    'expandSingle' => 1,
                    'useSortable' => 1,
                    'newRecordLinkAddTitle' => 1,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 0,
                    'showAllLocalizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                ],
                'overrideChildTca' => [
                    'columns' => [
                        'CType' => [
                            'config' => [
                                'itemsProcFunc' => ChildrenContentElements::class . '->allowedContentTypesContainer',
                                'default' => ChildrenContentElements::getDefaultCtype(),
                            ],
                        ],
                        'colPos' => [
                            'config' => [
                                'itemsProcFunc' => ChildrenContentElements::class . '->allowedColPosContainer',
                                'default' => ChildrenContentElements::getDefaultColPosContainer(),
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
);

// Configure the default backend fields for the content element
$GLOBALS['TCA']['tt_content']['palettes']['container_children'] = [
    'label' => 'LLL:EXT:container_manage_children/Resources/Private/Language/locallang.xlf:children_elements',
    'description' => 'LLL:EXT:container_manage_children/Resources/Private/Language/locallang.xlf:children_elements_description',
    'showitem' => 'container_children'
];

// Récupérer tous les types de conteneurs b13
$containerTypes = [];
if (isset($GLOBALS['TCA']['tt_content']['containerConfiguration'])) {
    foreach ($GLOBALS['TCA']['tt_content']['containerConfiguration'] as $cType => $configuration) {
        $containerTypes[] = $cType;
    }
}

// Ajouter la palette uniquement aux types de conteneurs b13
if (!empty($containerTypes)) {
    ExtensionManagementUtility::addToAllTCAtypes(
        'tt_content',
        '--palette--;LLL:EXT:container_manage_children/Resources/Private/Language/locallang.xlf:children_elements;container_children',
        implode(',', $containerTypes),
        'after:header'
    );
}