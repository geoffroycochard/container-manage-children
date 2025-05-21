<?php

declare(strict_types=1);

namespace Letsweb\ContainerManageChildren\EventListener;

use TYPO3\CMS\Core\Configuration\Event\AfterTcaCompilationEvent;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

class AfterTcaCompilationEventListener
{
    public function __invoke(AfterTcaCompilationEvent $event): void
    {
        $tca = $event->getTca();

        
        // Récupérer tous les types de conteneurs b13
        $containerTypes = [];
        
        if (isset($tca['tt_content']['containerConfiguration'])) {
            foreach ($tca['tt_content']['containerConfiguration'] as $cType => $configuration) {
                $containerTypes[] = $cType;
            }
        }
        // Ajouter la palette uniquement aux types de conteneurs b13
        if (!empty($containerTypes)) {
            
            ExtensionManagementUtility::addToAllTCAtypes(
                'tt_content',
                'container_children',
                implode(',', $containerTypes),
                'after:header'
            );
        }

        $event->setTca($GLOBALS['TCA']);
    }
} 