<?php

class ThemeHouse_ExtendClass_Listener_FileHealthCheck
{

    public static function fileHealthCheck(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
    {
        $hashes = array_merge($hashes,
            array(
                'library/ThemeHouse/ExtendClass/Extend/ThemeHouse/AddOnManager/PhpFile/ControllerAdmin.php' => '614d038c6a6dc9fe155cffbd579dc4b8',
                'library/ThemeHouse/ExtendClass/Extend/ThemeHouse/AddOnManager/PhpFile/DataWriter.php' => '995808b104b356d503ca2872e0f5ec44',
                'library/ThemeHouse/ExtendClass/Extend/ThemeHouse/AddOnManager/PhpFile/Installer.php' => '7de7995889cb3495c0c67ab58aec9c01',
                'library/ThemeHouse/ExtendClass/Extend/ThemeHouse/AddOnManager/PhpFile/Model.php' => 'd20a9b483c71f6059df9c642f77c1875',
                'library/ThemeHouse/ExtendClass/Extend/ThemeHouse/AddOnManager/Template/Admin/Edit.php' => '0f966ed07f7788fe0cfe9f768a5aced4',
                'library/ThemeHouse/ExtendClass/Extend/ThemeHouse/Objects/Model/Class.php' => '9827678c1955c8ccc58e6139aebd0224',
                'library/ThemeHouse/ExtendClass/Listener/LoadClassModel.php' => '593f6729fd95ad053ecd2767de6e0b67',
                'library/ThemeHouse/ExtendClass/Listener/LoadClassPhpFileThemeHouse.php' => '116361b339b862ac25a4b718034aa062',
                'library/ThemeHouse/ExtendClass/Listener/LoadClassTemplateThemeHouse.php' => '3f85f763a2a2cf5528f9d02ff26708b3',
                'library/ThemeHouse/ExtendClass/PhpFile/Extend/ThemeHouse/AddOnManager/PhpFile/Installer.php' => '800725a85c4cf5746670c9993226fbe7',
                'library/ThemeHouse/ExtendClass/PhpFile/Extend/ThemeHouse/Objects/Model/Class.php' => '9056855303935001fe72af52a2dc1936',
                'library/ThemeHouse/Listener/ControllerPreDispatch.php' => 'fdebb2d5347398d3974a6f27eb11a3cd',
                'library/ThemeHouse/Listener/ControllerPreDispatch/20150911.php' => 'f2aadc0bd188ad127e363f417b4d23a9',
                'library/ThemeHouse/Listener/InitDependencies.php' => '8f59aaa8ffe56231c4aa47cf2c65f2b0',
                'library/ThemeHouse/Listener/InitDependencies/20150212.php' => 'f04c9dc8fa289895c06c1bcba5d27293',
                'library/ThemeHouse/Listener/LoadClass.php' => '5cad77e1862641ddc2dd693b1aa68a50',
                'library/ThemeHouse/Listener/LoadClass/20150518.php' => 'f4d0d30ba5e5dc51cda07141c39939e3',
            ));
    }
}