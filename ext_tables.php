<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'CGB.' . $_EXTKEY,
	'Log',
	'Log'
);

if (TYPO3_MODE === 'BE') {

	/**
	 * Registers a Backend Module
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'CGB.' . $_EXTKEY,
		'web',	 // Make module a submodule of 'web'
		'changelog',	// Submodule key
		'',						// Position
		array(
			'Log' => 'list',
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_changelog.xlf',
		)
	);

}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'fechangelog');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_fechangelog_domain_model_log', 'EXT:fechangelog/Resources/Private/Language/locallang_csh_tx_fechangelog_domain_model_log.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_fechangelog_domain_model_log');
