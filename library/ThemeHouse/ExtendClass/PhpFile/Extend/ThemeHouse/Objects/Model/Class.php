<?php

class ThemeHouse_ExtendClass_PhpFile_Extend_ThemeHouse_Objects_Model_Class
    extends ThemeHouse_AddOnManager_PhpFile
{
	protected $_class;

	public function __construct($className, array $class)
	{
		parent::__construct($className);

		$this->_class = $class;

		$this->setExtends('XFCP_' . $className);

		$this->_createFunctionExportClass();
	}

	protected function _createFunctionExportClass()
	{
	    $function = $this->createFunction('exportClass');
	    $function->setSignature(array('array &$class', '$overwrite = false'));
	    $body = array(
    	    'parent::exportClass($class, $overwrite);',
    	    '',
    	    'if (array_key_exists(\'' . $this->_class['class_id']. '\', $class[\'handlers\'])) {',
    	    '    foreach ($class[\'handlers\'][\'' . $this->_class['class_id']. '\']',
    	    '             as $contentType => $' . lcfirst($this->_class['class_name_plural']). ') {',
    	    '',
    	    '        $contentTypeName = str_replace(" ", "", ucwords(',
    	    '            str_replace("_", " ", $contentType)));',
    	    '',
    	    '        $class[\'content_type\'] = $contentType;',
    	    '        $phpFile = ThemeHouse_AddOnManager_PhpFile::create(',
    	    '            \'' . $this->_class['addon_id']. '_PhpFile_' . $this->_class['class_name']. '\',',
    	    '            $class[\'addon_id\'] . \'_' . $this->_class['class_name']. '_\' . $contentTypeName,',
    	    '            $class',
    	    '        );',
    	    '',
    	    '        $phpFile->export($overwrite);',
    	    '    }',
    	    '}',
    	);
	    $function->setBody($body);
	}
}