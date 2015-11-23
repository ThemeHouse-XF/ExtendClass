<?php

class ThemeHouse_ExtendClass_Listener_LoadClassPhpFileThemeHouse extends ThemeHouse_Listener_LoadClass
{
	/**
	 * Gets the classes that are extended for this add-on. See parent for explanation.
	 *
	 * @return array
	 */
	protected function _getExtends()
	{
		return array(
			'ThemeHouse_AddOnManager_PhpFile_ControllerAdmin' => 'ThemeHouse_ExtendClass_Extend_ThemeHouse_AddOnManager_PhpFile_ControllerAdmin',
			'ThemeHouse_AddOnManager_PhpFile_DataWriter' => 'ThemeHouse_ExtendClass_Extend_ThemeHouse_AddOnManager_PhpFile_DataWriter',
			'ThemeHouse_AddOnManager_PhpFile_Installer' => 'ThemeHouse_ExtendClass_Extend_ThemeHouse_AddOnManager_PhpFile_Installer',
		    'ThemeHouse_AddOnManager_PhpFile_Model' => 'ThemeHouse_ExtendClass_Extend_ThemeHouse_AddOnManager_PhpFile_Model',
		);
	} /* END ThemeHouse_ExtendClass_Listener_LoadClassPhpFileThemeHouse::_getExtends */

	public static function loadClassPhpFileThemeHouse($class, array &$extend)
	{
		$loadClassPhpFileThemeHouse = new ThemeHouse_ExtendClass_Listener_LoadClassPhpFileThemeHouse($class, $extend);
		$extend = $loadClassPhpFileThemeHouse->run();
	} /* END ThemeHouse_ExtendClass_Listener_LoadClassPhpFileThemeHouse::loadClassPhpFileThemeHouse */
}