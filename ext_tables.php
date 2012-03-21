<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Showroom',
	'Showroom'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Showroom');

			t3lib_extMgm::addLLrefForTCAdescr('tx_nxshowroom_domain_model_resource', 'EXT:nxshowroom/Resources/Private/Language/locallang_csh_tx_nxshowroom_domain_model_resource.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_nxshowroom_domain_model_resource');
			$TCA['tx_nxshowroom_domain_model_resource'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:nxshowroom/Resources/Private/Language/locallang_db.xml:tx_nxshowroom_domain_model_resource',
					'label' => 'title',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Resource.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_nxshowroom_domain_model_resource.gif'
				),
			);

			t3lib_extMgm::addLLrefForTCAdescr('tx_nxshowroom_domain_model_image', 'EXT:nxshowroom/Resources/Private/Language/locallang_csh_tx_nxshowroom_domain_model_image.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_nxshowroom_domain_model_image');
			$TCA['tx_nxshowroom_domain_model_image'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:nxshowroom/Resources/Private/Language/locallang_db.xml:tx_nxshowroom_domain_model_image',
					'label' => 'image',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Image.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_nxshowroom_domain_model_image.gif'
				),
			);

			t3lib_extMgm::addLLrefForTCAdescr('tx_nxshowroom_domain_model_type', 'EXT:nxshowroom/Resources/Private/Language/locallang_csh_tx_nxshowroom_domain_model_type.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_nxshowroom_domain_model_type');
			$TCA['tx_nxshowroom_domain_model_type'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:nxshowroom/Resources/Private/Language/locallang_db.xml:tx_nxshowroom_domain_model_type',
					'label' => 'title',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Type.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_nxshowroom_domain_model_type.gif'
				),
			);

			t3lib_extMgm::addLLrefForTCAdescr('tx_nxshowroom_domain_model_tags', 'EXT:nxshowroom/Resources/Private/Language/locallang_csh_tx_nxshowroom_domain_model_tags.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_nxshowroom_domain_model_tags');
			$TCA['tx_nxshowroom_domain_model_tags'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:nxshowroom/Resources/Private/Language/locallang_db.xml:tx_nxshowroom_domain_model_tags',
					'label' => 'title',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Tags.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_nxshowroom_domain_model_tags.gif'
				),
			);

?>