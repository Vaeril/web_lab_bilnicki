<?php
require_once dirname(__FILE__).'/../config.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

switch($action){
    default:
        //klasa która ogarnie przetwarzanie danych
        require_once $config->root_path.'/app/converter/ConverterCtrl.class.php';
        
        $ctrl = new ConverterCtrl();
        $ctrl->start();
        break;
    case 'compute':
        //klasa która ogarnie przetwarzanie danych
        require_once $config->root_path.'/app/converter/ConverterCtrl.class.php';
        
        $ctrl = new ConverterCtrl();
        $ctrl->start();
        break;
    case 'otherAction':

        break;
}
