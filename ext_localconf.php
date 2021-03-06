<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Showroom',
	array(
		'Resource' => 'list, show, new, create, edit, update, delete',
		'Attachment' => 'show, new, create, edit, update, delete',
		'Type' => 'list, show, new, create, edit, update',
		'Tags' => 'list, new, create, edit, update, delete',

	),
	// non-cacheable actions
	array(
		'Resource' => 'create, update, delete',
		'Attachment' => 'create, update, delete',
		'Type' => 'create, update',
		'Tags' => 'create, update, delete',

	)
);

?>