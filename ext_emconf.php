<?php

########################################################################
# Extension Manager/Repository config file for ext "session".
#
# Auto generated 13-10-2011 10:39
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Session',
	'description' => 'Provides userfunctions to set and get session variables in typoscript context.',
	'category' => 'plugin',
	'author' => 'Armin Ruediger Vieweg',
	'author_email' => 'info@professorweb.de',
	'author_company' => '',
	'shy' => '',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'version' => '1.2.2',
	'loadOrder' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.5.0-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:9:{s:12:"ext_icon.gif";s:4:"2ed8";s:17:"ext_localconf.php";s:4:"3bb1";s:14:"ext_tables.php";s:4:"9298";s:14:"ext_tables.sql";s:4:"d41d";s:29:"Classes/class.userSession.php";s:4:"b15c";s:35:"Classes/user_conditionFunctions.php";s:4:"7165";s:28:"Classes/Utility/Settings.php";s:4:"6428";s:34:"Configuration/TypoScript/setup.txt";s:4:"d8c1";s:14:"doc/manual.sxw";s:4:"0d5f";}',
	'suggests' => array(
	),
);

?>