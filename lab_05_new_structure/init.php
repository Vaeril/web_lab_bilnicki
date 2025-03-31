<?php
require_once 'core/Config.class.php';
$config = new Config();
include 'config.php';

function &getConfig() {global $config; return $config;}

require_once getConfig()->root_path.'/core/Messages.class.php';
$messages = new Messages();

function &getMessages() { global $messages; return $messages; }

$smarty = null;
function &getSmarty() {
    global $smarty;
    if(!isset($smarty)){
        include_once getConfig()->root_path.'/lib/smarty/libs/Smarty.class.php';
        
        $smarty = new Smarty\Smarty();
        
        $smarty->assign('config', getConfig());
        $smarty->assign('messages', getMessages());
        $smarty->setTemplateDir(array(
            'one' => getConfig()->root_path.'/app/views',
            'two' => getConfig()->root_path.'/app/views/templates'));
    }
    return $smarty;
}

require_once getConfig()->root_path.'/core/functions.php';

$action = getFromRequest('action');