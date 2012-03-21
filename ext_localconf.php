<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Showroom',
	array(
		'Resource' => 'list, show, new, create, edit, update, delete',
		'Type' => 'list, show, new, create, edit, update, delete',
		'Tags' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Resource' => 'create, update, delete',
		'Type' => 'create, update, delete',
		'Tags' => 'create, update, delete',
		
	)
);

?>