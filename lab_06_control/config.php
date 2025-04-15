<?php

$config->root_path = dirname(__FILE__);
$config->server_name = 'localhost:80';
$config->server_url = 'http://'.$config->server_name;
$config->app_root = '/web_lab_bilnicki/lab_06_control';
$config->app_url = $config->server_url.$config->app_root;
$config->action_root = $config->app_root.'/mainCtrl.php?action=';
$config->action_url = $config->server_url.$config->action_root;
$config->login_action = 'login';
?>