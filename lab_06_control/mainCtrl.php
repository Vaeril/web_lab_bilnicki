<?php
require_once dirname(__FILE__).'/init.php';

switch($action){
    default:
        control('app\\controllers', 'ConverterCtrl', 'start', ['user', 'admin']);
    case 'login':
        control('app\\controllers', 'LoginCtrl', 'start');
    case 'compute':        
        control('app\\controllers', 'ConverterCtrl', 'start', ['user', 'admin']);
    case 'logout':
        control('app\\controllers', 'LoginCtrl', 'doLogout', ['user', 'admin']);
    case 'otherAction':
        print('other action - currently not implemented');
        break;
}
