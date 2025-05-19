<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'LLL:EXT:container_manage_children/Resources/Private/Language/locallang.xlf:title',
    'description' => 'LLL:EXT:container_manage_children/Resources/Private/Language/locallang.xlf:description',
    'category' => 'fe',
    'state' => 'stable',
    'author' => 'Letsweb',
    'author_email' => 'contact@letsweb.fr',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-12.4.99',
            'container' => '2.2.0-2.2.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
]; 