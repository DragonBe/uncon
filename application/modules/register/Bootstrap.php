<?php

class Register_Bootstrap extends Zend_Application_Module_Bootstrap
{
    public function _initAutoload()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array(
            'namespace' => 'Register',
            'basePath'  => dirname(__FILE__),
        ));
        return $autoloader;
    }
}