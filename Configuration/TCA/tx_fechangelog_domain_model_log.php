<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:fechangelog/Resources/Private/Language/locallang_db.xlf:tx_fechangelog_domain_model_log',
		'label' => 'table_name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'hideTable' => TRUE,
        
		'dividers2tabs' => TRUE,

		'enablecolumns' => array(

		),
		'searchFields' => 'table_name,record_uid,field_name,field_type,action,old_string,new_string,old_text,new_text,feuser,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('fechangelog') . 'Resources/Public/Icons/tx_fechangelog_domain_model_log.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'table_name, record_uid, field_name, field_type, action, old_string, new_string, old_text, new_text, feuser',
	),
	'types' => array(
		'1' => array('showitem' => 'table_name, record_uid, field_name, field_type, action, old_string, new_string, old_text, new_text, feuser, '),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(

		'table_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fechangelog/Resources/Private/Language/locallang_db.xlf:tx_fechangelog_domain_model_log.table_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'record_uid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fechangelog/Resources/Private/Language/locallang_db.xlf:tx_fechangelog_domain_model_log.record_uid',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'field_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fechangelog/Resources/Private/Language/locallang_db.xlf:tx_fechangelog_domain_model_log.field_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'field_type' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fechangelog/Resources/Private/Language/locallang_db.xlf:tx_fechangelog_domain_model_log.field_type',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'action' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fechangelog/Resources/Private/Language/locallang_db.xlf:tx_fechangelog_domain_model_log.action',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'old_string' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fechangelog/Resources/Private/Language/locallang_db.xlf:tx_fechangelog_domain_model_log.old_string',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'new_string' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fechangelog/Resources/Private/Language/locallang_db.xlf:tx_fechangelog_domain_model_log.new_string',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'old_text' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fechangelog/Resources/Private/Language/locallang_db.xlf:tx_fechangelog_domain_model_log.old_text',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'new_text' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fechangelog/Resources/Private/Language/locallang_db.xlf:tx_fechangelog_domain_model_log.new_text',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		),
		'feuser' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fechangelog/Resources/Private/Language/locallang_db.xlf:tx_fechangelog_domain_model_log.feuser',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'fe_users',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		
	),
);