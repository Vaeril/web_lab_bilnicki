<?php

require_once 'core/Config.class.php';
$config = new core\Config();
require_once 'config.php'; //ustaw konfigurację

function &getConfig(){ global $config; return $config; }

//załaduj definicję klasy Messages i stwórz obiekt
require_once 'core/Messages.class.php';
$messages = new core\Messages();

function &getMessages(){ global $messages; return $messages; }

//przygotuj Smarty, twórz tylko raz - wtedy kiedy potrzeba
$smarty = null;	
function &getSmarty(){
	global $smarty;
	if (!isset($smarty)){
		//stwórz Smarty
		include_once 'lib/smarty/libs/Smarty.class.php';
		$smarty = new Smarty\Smarty();	
		//przypisz konfigurację i messages
		$smarty->assign('config',getConfig());
		$smarty->assign('messages',getMessages());
		//zdefiniuj lokalizację widoków (aby nie podawać ścieżek przy odwoływaniu do nich)
		$smarty->setTemplateDir(array(
			'one' => getConfig()->root_path.'/app/views',
			'two' => getConfig()->root_path.'/app/views/templates'
		));
	}
	return $smarty;
}

require_once 'core/ClassLoader.class.php'; //załaduj i stwórz loader klas
$cloader = new core\ClassLoader();
function &getLoader() {
    global $cloader;
    return $cloader;
}

require_once 'core/functions.php';

$action = getFromRequest('action');