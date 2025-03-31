<?php
require_once dirname(__FILE__).'/init.php';
use app\controllers\ConverterCtrl;

switch($action){
    default:
        //klasa która ogarnie przetwarzanie danych

        $ctrl = new ConverterCtrl();
        $ctrl->start();
        break;
    case 'compute':
        //klasa która ogarnie przetwarzanie danych
        
        $ctrl = new ConverterCtrl();
        $ctrl->start();
        break;
    case 'otherAction':
        print('other action - currently not implemented');
        break;
}
