<?php

class ThemeHouse_ExtendClass_Extend_ThemeHouse_AddOnManager_PhpFile_Installer
	extends XFCP_ThemeHouse_ExtendClass_Extend_ThemeHouse_AddOnManager_PhpFile_Installer
{
    /**
     * @param array $body
     * @param ThemeHouse_AddOnManager_PhpFileFunction $function
     */
    protected function _createFunctionGetTables(array $body = array(), ThemeHouse_AddOnManager_PhpFileFunction &$function = null)
    {
        parent::_createFunctionGetTables($body, $function);

        if ($this->_class['extend']) {
            $body = $function->getBody();
            $body[0]['\''.$this->_class['table_name'].'\'']['\''.$this->_class['primary_key_id'].'\'']
                = '\'INT(10) UNSIGNED NOT NULL PRIMARY KEY\'';
            $function->setBody($body);
        }

    }
}