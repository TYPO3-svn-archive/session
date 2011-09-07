<?php

function user_sessionVariableIsSet($sessionVar = '') {
	return ($GLOBALS['TSFE']->fe_user->getKey('ses', 'tx_session_' . $sessionVar));
}

function user_sessionVariableIsNotSet($sessionVar = '') {
	return (!$GLOBALS['TSFE']->fe_user->getKey('ses', 'tx_session_' . $sessionVar));
}

?>