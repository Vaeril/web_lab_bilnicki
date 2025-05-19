<?php

namespace app\controllers;


use app\forms\RegisterForm;
use app\forms\LoginForm;
use core\App;
use core\Message;
use core\Messages;
use core\Utils;
use core\SessionUtils;
use core\RoleUtils;
use core\Validator;

class NotesCtrl {

  public function action_notesList() {
        App::getSmarty()->display("NotesList.tpl");
  }

  public function action_addNote() {
        App::getSmarty()->display("AddNote.tpl");
  }
}