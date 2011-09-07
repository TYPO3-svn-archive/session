<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

if (TYPO3_MODE !== 'BE') {
	// Load conditions just in frontend
	include_once(t3lib_extMgm::extPath('session') . 'Classes/user_conditionFunctions.php');
}

?>