<?php

class ThemeHouse_ExtendClass_Extend_ThemeHouse_AddOnManager_PhpFile_DataWriter
	extends XFCP_ThemeHouse_ExtendClass_Extend_ThemeHouse_AddOnManager_PhpFile_DataWriter
{
    public function __construct($className, array $class)
    {
        parent::__construct($className, $class);

        if ($class['extend']) {
            $this->setExtends($class['extend']['addon_id'] . '_DataWriter_' . $class['extend']['class_name']);
        }
    }

    protected function _createFunctionGetFields()
    {
        if ($this->_class['extend']) {
            $function = $this->createFunction('_getFields');
            $function->setPhpDoc(array(
                'Returns all '.$this->_class['extend']['table_name'].' fields, plus ' . strtolower($this->_class['extend']['title']) . '-specific fields.',
                '',
                '@return array',
            ));
            $body = 'return parent::_getFields() + $this->_get' . $this->_class['extend']['class_name'] . 'Fields();';
            $function->addToBody($body);

            $function = $this->createFunction('_get' . $this->_class['extend']['class_name'] . 'Fields');
            $function->setPhpDoc(array(
                'Gets the ' . strtolower($this->_class['extend']['title']) . '-specific fields that are defined for the table.',
                '',
                '@return array',
            ));
            $body = array(
                '\'' . $this->_class['table_name'] . '\'' => array(
                    '\'' . $this->_class['primary_key_id'] . '\'' => 'array(\'default\' => array(\'' . $this->_class['extend']['table_name'] . '\', \'' . $this->_class['primary_key_id'] . '\'), \'required\' => true)',
                )
            );
            $this->_prepareFields($body);
            $function->addToBody($body);
            $function->setMerge();
        }
        else
        {
            parent::_createFunctionGetFields();
        }
    }

    protected function _createFunctionGetUpdateCondition()
    {
        if (!$this->_class['extend']) {
            return parent::_createFunctionGetUpdateCondition();
        }
    }

    protected function _createFunctionPreSave($body = array())
    {
        if ($this->_class['extend']) {
            $body = array_merge($body, array(
                '$this->set(\'extra_data_cache\', array(\'content_field\' => $this->get(\'content_field\')));',
            ));
        }
        parent::_createFunctionPreSave($body);
    }
}