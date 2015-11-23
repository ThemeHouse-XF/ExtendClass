<?php

class ThemeHouse_ExtendClass_Extend_ThemeHouse_Objects_Model_Class extends XFCP_ThemeHouse_ExtendClass_Extend_ThemeHouse_Objects_Model_Class
{
	public function exportClass(array &$class, $overwrite = false)
	{
	    if ($class['parent'])
	    {
	        /* @var $classModel ThemeHouse_Objects_Model_Class */
	        $classModel = XenForo_Model::create('ThemeHouse_Objects_Model_Class');

	        $class['parent'] = $classModel->getClassById($class['extend']);
	        $class['parent'] = $this->_prepareClass($class['extend']);
	    }

	    if ($class['extend'])
	    {
    	    /* @var $classModel ThemeHouse_Objects_Model_Class */
    	    $classModel = XenForo_Model::create('ThemeHouse_Objects_Model_Class');

    	    $class['extend'] = $classModel->getClassById($class['extend']);
	        $class['extend'] = $this->_prepareClass($class['extend']);
	        if ($class['extend']['title_field']) {
    	        $class['title_field'] = $class['extend']['title_field'];
	        } else {
	            $class['title_field'] = 'title';
	        }
	        if ($class['extend']['subtitle_field']) {
	            $class['subtitle_field'] = $class['extend']['subtitle_field'];
	        } else {
	            $class['subtitle_field'] = 'subtitle';
	        }
	        $class['primary_key_id'] = $class['extend']['primary_key_id'];

	        $class = $this->_prepareClass($class);

	        if ($class['extend']['addon_id'] == 'ThemeHouse_Objects' && $class['extend']['class_id'] == 'handler')
	        {
    	        $listenerClass = $class['addon_id'] . '_Extend_ThemeHouse_AddOnManager_PhpFile_Installer';
    	        $phpFile = ThemeHouse_AddOnManager_PhpFile::create(
    	                'ThemeHouse_ExtendClass_PhpFile_Extend_ThemeHouse_AddOnManager_PhpFile_Installer',
    	                $listenerClass,
    	                $class
    	        );
    	        $phpFile->export($overwrite);
    	        $class['extends']['load_class_phpfile_th']['ThemeHouse_AddOnManager_PhpFile_Installer'] = $listenerClass;

    	        $listenerClass = $class['addon_id'] . '_Extend_ThemeHouse_Objects_Model_Class';
    	        $phpFile = ThemeHouse_AddOnManager_PhpFile::create(
    	                'ThemeHouse_ExtendClass_PhpFile_Extend_ThemeHouse_Objects_Model_Class',
    	                $listenerClass,
    	                $class
    	        );
    	        $phpFile->export($overwrite);
    	        $class['extends']['load_class_model']['ThemeHouse_Objects_Model_Class'] = $listenerClass;
	        }
	    }

	    parent::exportClass($class, $overwrite);
	}
}