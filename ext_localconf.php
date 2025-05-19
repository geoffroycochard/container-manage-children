<?php

defined('TYPO3') or die();

// Désactiver le hook de copie pour éviter les doublons
if ($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass']['tx_container-post-process'] ?? false) {
    unset($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass']['tx_container-post-process']);
} 