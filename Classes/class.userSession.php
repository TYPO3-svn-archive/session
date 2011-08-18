<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Armin Rüdiger Vieweg <armin.vieweg@diemedialen.de>
*
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * Session class contains two methods "set" and "get" which stores any values in session variables.
 *
 * Full configuration example:
 *
 * includeLibs.user_Session = EXT:session/Classes/class.userSession.php
 *
 * # This sets a variable
 * lib.setSessionVar = USER_INT
 * lib.setSessionVar {
 *   userFunc = user_Session->set
 *   userFunc {
 *     name = myCoolVariable
 *     value = awesome value
 *   }
 * }
 *
 * # Btw. you can use for name and value typoscript, which will be interpreted. For example:
 * lib.setSessionVar.userFunc.value = TEXT
 * lib.setSessionVar.userFunc.value.data = page:uid
 *
 * # This gets a variable
 * lib.getSessionVar = USER_INT
 * lib.getSessionVar {
 *   userFunc = user_Session->get
 *   userFunc {
 *     name = myCoolVariable
 *   }
 * }
 *
 * Notice:
 * If you include the static template of EXT:session you don't need to define this libraries.
 * They are already provided, but without any default values.
 *
 */
class user_Session {
	/**
	 * @var array
	 */
	private $userFunc;

	/**
	 * @var Tx_Session_Utility_Settings Session Utility
	 */
	protected $settingsUtility = NULL;


	/**
	 * Initializes the userfunction
	 *
	 * @return void
	 */
	protected function initializeUserfunction($conf) {
		require_once(t3lib_div::getFileAbsFileName('EXT:session/Classes/Utility/Settings.php'));
		$this->settingsUtility = t3lib_div::makeInstance('Tx_Session_Utility_Settings');
		$this->userFunc = $this->settingsUtility->renderConfigurationArray($conf['userFunc.']);
	}

	/**
	 * User_function to set a session variable
	 *
	 * @param string $content an empty string which is not used, but have to be set
	 * @param array $conf the typoscript configuration array which also contains
	 *                    the userFunction properties
	 *
	 * @return void
	 */
	public function set($content = '', $conf = array()) {
		$this->initializeUserfunction($conf);

		$name = $this->userFunc['name'];
		$dontWriteSessionVar = intval($this->userFunc['dontWriteSessionVar']);
		if (!empty($name) && $dontWriteSessionVar === 0) {
			$value = $this->userFunc['value'];
			$GLOBALS['TSFE']->fe_user->setKey('ses', 'tx_session_' . $name, $value);
		}
	}


	/**
	 * User_function to get a session variable
	 *
	 * @param string $content an empty string which is not used, but have to be set
	 * @param array $conf the typoscript configuration array which also contains
	 *                    the userFunction properties
	 *
	 * @return void
	 */
	public function get($content = '', $conf = array()) {
		$this->initializeUserfunction($conf);

		$name = $this->userFunc['name'];
		if (!empty($name)) {
			return $GLOBALS['TSFE']->fe_user->getKey('ses', 'tx_session_' . $name);
		}
	}

}
?>