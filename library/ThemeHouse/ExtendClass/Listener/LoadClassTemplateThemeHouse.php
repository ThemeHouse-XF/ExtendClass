<?php

class ThemeHouse_ExtendClass_Listener_LoadClassTemplateThemeHouse extends ThemeHouse_Listener_LoadClass
{
	/**
	 * Gets the classes that are extended for this add-on. See parent for explanation.
	 *
	 * @return array
	 */
	protected function _getExtends()
	{
		return array(
			'ThemeHouse_AddOnManager_Template_Admin_Edit' => 'ThemeHouse_ExtendClass_Extend_ThemeHouse_AddOnManager_Template_Admin_Edit',
		);
	} /* END ThemeHouse_ExtendClass_Listener_LoadClassTemplateThemeHouse::_getExtends */

	public static function loadClassTemplateThemeHouse($class, array &$extend)
	{
		$loadClassTemplateThemeHouse = new ThemeHouse_ExtendClass_Listener_LoadClassTemplateThemeHouse($class, $extend);
		$extend = $loadClassTemplateThemeHouse->run();
	} /* END ThemeHouse_ExtendClass_Listener_LoadClassTemplateThemeHouse::loadClassTemplateThemeHouse */
}