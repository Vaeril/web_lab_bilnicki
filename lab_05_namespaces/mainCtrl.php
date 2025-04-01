<?php
require_once dirname(__FILE__).'/init.php';

use app\controllers\ConverterCtrl;

switch($action){
    default:
        $ctrl = new ConverterCtrl();
        $ctrl->start();
        break;
    case 'compute':
        $ctrl = new ConverterCtrl();
        $ctrl->start();
        break;
    case 'otherAction':
        print('other action - currently not implemented');
        break;
}
