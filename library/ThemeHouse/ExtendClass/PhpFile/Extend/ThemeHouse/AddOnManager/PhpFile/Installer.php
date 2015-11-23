<?php

class ThemeHouse_ExtendClass_PhpFile_Extend_ThemeHouse_AddOnManager_PhpFile_Installer
    extends ThemeHouse_AddOnManager_PhpFile
{
	protected $_class;

	public function __construct($className, array $class)
	{
		parent::__construct($className);

		$this->_class = $class;

		$this->setExtends('XFCP_' . $className);

		$this->_createFunctionCreateFunctionGetContentTypes();
	}

	protected function _createFunctionCreateFunctionGetContentTypes()
	{
	    $function = $this->createFunction('_createFunctionGetContentTypes');
	    $function->setSignature(array('array $body = array()'));
	    $body = array(
	        'if (array_key_exists(\'' . $this->_class['class_id']. '\', $this->_class[\'handlers\'])) {',
	        '    foreach ($this->_class[\'handlers\'][\'' . $this->_class['class_id']. '\']',
	        '             as $contentType => $' . lcfirst($this->_class['class_name']). ') {',
	        '        $contentTypeName = str_replace(" ", "", ucwords(str_replace("_", " ", $contentType)));',
	        '        $body[\'\\\'\'.$contentType.\'\\\'\'][\'\\\'fields\\\'\'][\'\\\'' . $this->_class['class_id']. '_class\\\'\'] =',
	        '            \'\\\'\' . $this->_class[\'addon_id\'] . \'_' . $this->_class['class_name']. '_\' . $contentTypeName . \'\\\'\';',
	        '    }',
	        '}',
	        '',
	        'parent::_createFunctionGetContentTypes($body);',
	    );
	    $function->setBody($body);
	}
}