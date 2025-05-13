<?php

namespace app\controllers;


use core\App;
use core\Message;
use core\Utils;

class TestCtrl {

  public function action_test() {
        App::getSmarty()->display("Test.tpl");
  }

}