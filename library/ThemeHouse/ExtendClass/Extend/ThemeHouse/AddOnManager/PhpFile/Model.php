<?php

class ThemeHouse_ExtendClass_Extend_ThemeHouse_AddOnManager_PhpFile_Model
	extends XFCP_ThemeHouse_ExtendClass_Extend_ThemeHouse_AddOnManager_PhpFile_Model
{
    /**
	 * @param array $body
	 * @param ThemeHouse_AddOnManager_PhpFileFunction $function
	 */
	protected function _createFunctionGetPlural(array $body = array(), ThemeHouse_AddOnManager_PhpFileFunction &$function = null)
	{
        parent::_createFunctionGetPlural($body, $function);
	    if ($this->_class['extend']) {
    	    $body = array(
	            '$whereClause = $this->prepare' . $this->_class['class_name'] . 'Conditions($conditions, $fetchOptions);',
	            '$joinOptions = $this->prepare' . $this->_class['class_name'] . 'FetchOptions($fetchOptions);',
	            '',
	            '$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);',
	            '',
	            'return $this->fetchAllKeyed($this->limitQueryResults(\'',
    			'		SELECT ' . $this->_class['class_id'] . '.*, ' . $this->_class['extend']['class_id'] . '.*',
	            '			\' . $joinOptions[\'selectFields\'] . \'',
	            '		FROM ' . $this->_class['table_name'] . ' AS ' . $this->_class['class_id'],
    		    '       INNER JOIN ' . $this->_class['extend']['table_name'] . ' AS ' . $this->_class['extend']['class_id'] . ' ON (' . $this->_class['extend']['class_id'] . '.' . $this->_class['primary_key_id'] . ' = ' . $this->_class['class_id'] . '.' . $this->_class['primary_key_id'] . ')',
	            '		\' . $joinOptions[\'joinTables\'] . \'',
	            '		WHERE \' . $whereClause . \'',
	            '	\', $limitOptions[\'limit\'], $limitOptions[\'offset\']',
	            '), \'' . $this->_class['primary_key_id'] . '\');'
	        );
    	    $function->setBody($body);
	    }
	}
}