<?php

declare(strict_types=1);

namespace Letsweb\ContainerManageChildren\Tca;

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ChildrenContentElements
{
    protected static string $defaultContentType = 'text';
    protected static int $defaultColPosContainer = 201;

    public static function getDefaultColPosContainer(): int
    {
        return self::$defaultColPosContainer;
    }

    public static function getDefaultCtype(): string
    {
        return self::$defaultContentType;
    }

    public function allowedContentTypesContainer(array &$parameters): void
    {
        // Récupérer tous les types de contenu disponibles
        $contentTypes = $GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'] ?? [];
        $parameters['items'] = $contentTypes;

    }

    public function allowedColPosContainer(array &$parameters): void
    {
        $parameters['items'][] = ['Error: Could not get colPos from container configuration', 0];
        $parentIdentifier = (int)($parameters['inlineParentUid'] ?? 0);
        if ($parentIdentifier > 0) {
            $row = BackendUtility::getRecord('tt_content', $parentIdentifier);
            if ($row['CType'] ?? false) {
                $parameters['items'] = $this->getColPosForContentType($row['CType']);
            }
        }
    }

    protected function getColPosForContentType(string $cType): array
    {
        $configuration = [];
        foreach ($GLOBALS['TCA']['tt_content']['containerConfiguration'][$cType]['grid'] ?? [] as $items) {
            foreach ($items as $item) {
                if (isset($item['name']) && isset($item['colPos'])) {
                    $configuration[] = [$item['name'], $item['colPos']];
                }
            }
        }
        return $configuration;
    }
} 