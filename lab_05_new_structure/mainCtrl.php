<?php
require_once dirname(__FILE__).'/init.php';

switch($action){
    default:
        //klasa która ogarnie przetwarzanie danych
        require_once getConfig()->root_path.'/app/converter/ConverterCtrl.class.php';
        
        $ctrl = new ConverterCtrl();
        $ctrl->start();
        break;
    case 'compute':
        //klasa która ogarnie przetwarzanie danych
        require_once getConfig()->root_path.'/app/converter/ConverterCtrl.class.php';
        
        $ctrl = new ConverterCtrl();
        $ctrl->start();
        break;
    case 'otherAction':
        print('other action - currently not implemented');
        break;
}
