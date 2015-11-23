<?php

class ThemeHouse_ExtendClass_Extend_ThemeHouse_AddOnManager_Template_Admin_Edit
    extends XFCP_ThemeHouse_ExtendClass_Extend_ThemeHouse_AddOnManager_Template_Admin_Edit
{
    protected function _prepareFields(&$fields = array(), array $class = null)
    {
	    if (!$class) {
	        $class = $this->_class;
	    }

	    if ($class['extend']) {
	        $this->_prepareFields($fields, $class['extend']);
	    }

	    parent::_prepareFields($fields, $class);

	    if ($class['extend']) {
    	    $fields = array_merge($fields, array(
    	        '    <input type="hidden" name="' . $class['extend']['class_id'] . '_type_id" value="' . $class['class_id'] . '" />',
    	    ));
	    }
    }
}