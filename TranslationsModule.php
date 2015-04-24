<?php
/**
 * Created by PhpStorm.
 * User: chrystian
 * Date: 9/26/14
 * Time: 9:56 AM
 */

class TranslationsModule extends CWebModule
{
    public $defaultController='manage';

    public $defaultLang = "en";
    /**
     * @var array Array with available languages
     */
    public $langs = array(
        "en" => "English"
    );

    public $controllerMap = array(
        'index' => 'translations.controllers.ManageController',
    );

    public function init()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $this->setImport(array(
            'translations.models.*',
            'translations.controllers.*',
            'translations.views.*',
            'translations.helpers.*'
        ));

        foreach($this->langs as $code => $name) {
            $this->controllerMap[$code] = 'translations.controllers.ManageController';
        }
    }

    public function beforeControllerAction($controller, $action)
    {
        if(parent::beforeControllerAction($controller, $action))
        {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        }
        else
            return false;
    }

    public function addTranslatorRoles($roles = array()) {
        foreach($this->langs as $code => $name) {
            $roles[] = 'translator-'.$code;
        }

        return $roles;
    }
} 