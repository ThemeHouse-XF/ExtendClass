<?php

class ThemeHouse_ExtendClass_Extend_ThemeHouse_AddOnManager_PhpFile_ControllerAdmin
	extends XFCP_ThemeHouse_ExtendClass_Extend_ThemeHouse_AddOnManager_PhpFile_ControllerAdmin
{
    public function __construct($className, array $class)
    {
        parent::__construct($className, $class);

		if ($class['extend']) {
            $this->setExtends($class['extend']['addon_id'] . '_ControllerAdmin_' . $class['extend']['class_name'] . 'Abstract');
        }

        $this->_createFunctionGetDataWriter();
    }

	protected function _createFunctionActionIndex()
	{
	    if ($this->_class['extend']) {
    		$function = $this->createFunction('actionIndex');
		    $variable = $this->createVariable('_' . lcfirst($this->_class['extend']['class_name']) . 'DataWriterName');
			$variable->setPhpDoc(array(
				'Name of the DataWriter that will handle this ' . strtolower($this->_class['extend']['title']) . ' type',
				'',
				'@var string',
			));
			$variable->setValue('\''.$this->_class['datawriter'].'\'');
			$function->setBody(array('return $this->responseReroute(\'' . $this->_class['extend']['addon_id'] . '_ControllerAdmin_' . $this->_class['extend']['class_name'] . '\', \'index\');'));
		}
		else {
			parent::_createFunctionActionIndex();
		}
	}

	protected function _prepareChoices(&$choices = array(), $class = null)
	{
	    if (!$class) {
	        $class = $this->_class;
	    }
	    if ($class['extend'])
	    {
	        $this->_prepareChoices($choices, $class['extend']);
	    }
	    parent::_prepareChoices($choices, $class);
	}

	protected function _prepareViewParams()
	{
	    $viewParams = parent::_prepareViewParams();
	    if ($this->_class['node_type']) {
	        $viewParams = array_merge($viewParams, array(
//                '	\'addOnOptions\' => $addOnModel->getAddOnOptionsListIfAvailable(),',
//			    '   \'addOnSelected\' => (isset($'.lcfirst($this->_class['class_name']).'[\'addon_id\']) ? $'.lcfirst($this->_class['class_name']).'[\'addon_id\'] : $addOnModel->getDefaultAddOnId()),',
	        ));
	    }
	    return $viewParams;
	}

	protected function _prepareGetDataWriterString()
	{
	    if ($this->_class['extend']) {
	        return '$this->_get' . $this->_class['extend']['class_name'] . 'DataWriter()';
	    }
	    return parent::_prepareGetDataWriterString();
	}

	protected function _prepareInput(&$input = array(), array $class = null)
	{
	    if (!$class) {
	        $class = $this->_class;
	    }
	    if ($class['extend'])
	    {
	        $this->_prepareInput($input, $class['extend']);
	    }
	    parent::_prepareInput($input, $class);
	}

	protected function _prepareRedirect()
	{
	    if ($this->_class['extend']) {
    	    return array(
	            '',
	            'if ($this->_input->filterSingle(\'reload\', XenForo_Input::STRING)) {',
	            '	return $this->responseRedirect(',
	            '		XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED,',
	            '		XenForo_Link::buildAdminLink(\'' . $this->_class['extend']['route_prefix_admin'] . '/edit\', $writer->getMergedData())',
	            '	);',
	            '} else {',
	            '	return $this->responseRedirect(',
	            '		XenForo_ControllerResponse_Redirect::SUCCESS,',
	            '		XenForo_Link::buildAdminLink(\'' . $this->_class['extend']['route_prefix_admin'] . '\') . $this->getLastHash($writer->get(\''.lcfirst($this->_class['primary_key_id']).'\'))',
	            '	);',
	            '}',
	        );
	    }
	    return parent::_prepareRedirect();
	}

	protected function _createFunctionGetDataWriter()
	{
	    if ($this->_class['extend']) {
	        $function = $this->createFunction('_get' . $this->_class['extend']['class_name'] . 'DataWriter');
	        $function->setPhpDoc(array('Get the ' . strtolower($this->_class['title_plural']) . ' data writer.', '', '@return ' . $this->_class['datawriter']));
	        $body = array('return XenForo_DataWriter::create($this->_' . lcfirst($this->_class['extend']['class_name']) . 'DataWriterName);');
	        $function->setBody($body);
	    }
	}
}