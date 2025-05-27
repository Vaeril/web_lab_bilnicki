<?php

namespace app\controllers;

use app\forms\NoteForm;
use core\App;
use core\SessionUtils;
use core\Validator;
use core\Message;
use core\Messages;

class GroupsCtrl {

      private $searchName;
      private $serachMember;
      private $groupName;
      private $groupId;

  // show groups list

  public function action_groupsList() {
      $this->validateList();
      $this->getRecords();
      $this->generateListView();
  }

  function validateList() {
      $this->searchName = "";
      $v = new Validator();
      $this->searchName = $v->validateFromRequest("name");

      $memberMail = $v->validateFromRequest("member");
  }

  function getRecords() {
      // filtering from title and category
      
      $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
      if (isset($this->searchName) && strlen($this->searchName) > 0) {
            $search_params['name[~]'] = $this->searchName . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
      }

      $search_params['users_id'] = SessionUtils::load("id", true);  
      $where = ["AND" => &$search_params];

      $database = App::getDB()->select("groups",
      [
            "[><]groups_has_users" => ["id" => "groups_id"],
            "[><]users" => ["owner" => "id"]
      ], [
            "groups.id",
            "groups.name",
            "groups.owner",
            "users.mail"
      ], ["groups_has_users.users_id" => SessionUtils::load("id", true)]);

      App::getSmarty()->assign("records", $database);
  }

  function generateListView() {
        App::getSmarty()->display("GroupsList.tpl");
  }

  // add group

  public function action_addGroup() {
      if($this->validateAddingGroup()){
            $this->saveNewGroup();
            $this->redirectToListView();
      } else {
            $this->returnToAddGroup();
      }
  }

  function validateAddingGroup() {
        $v = new Validator();

        $this->groupName = $v->validateFromRequest("name", 
        ["required" => true]);
        if($v->isLastOK() == false){
            App::getMessages()->clear();
            return false;
        }

        return true;
  }

  function saveNewGroup() {
        App::getDB()->insert("groups",[
        "name" => $this->groupName,
        "owner" => SessionUtils::load("id", true)
        ]);

        $groups = App::getDB()->select("groups", ["id"], 
        ["owner" => SessionUtils::load("id", true)]);

        $lastGroupId = 0;
        foreach($groups as $group){
            $lastGroupId = $group["id"];
        }

        App::getDB()->insert("groups_has_users", [
            "users_id" => SessionUtils::load("id", true),
            "groups_id" => $lastGroupId
        ]);
        
        App::getDB()->insert("categories",[
        "name" => "no category",
        "color" => "red",
        "owner_group" => $lastGroupId,
        "is_group_category" => 1]
        );
  }

  function returnToAddGroup() {
        App::getSmarty()->display("AddGroup.tpl");
  }

  function redirectToListView() {
      App::getRouter()->redirectTo("groupsList");
  }

  // enter group space

  function action_enterGroupSpace() {
      if($this->validateEntering()){
            App::getRouter()->redirectTo("notesList");
      } else {
            $this->redirectToListView();
      }
}

  function validateEntering() {
      $v = new Validator();

      $groupId = $v->validateFromCleanURL(1, 
        ["required" => true, "required_message" => "System error"]);
        
      if($v->isLastOK() == false){
            return false;
      }

      $databaseCheck = App::getDB()->select("groups_has_users",
      ["[><]groups" => ["groups_id" => "id"]],
      ["groups.name"],
      ["AND" =>
            ["groups_id" => $groupId,
            "users_id" => SessionUtils::load("id", true)]
      ]);

      if(count( $databaseCheck) == 0){
            return false;
      }
      
      SessionUtils::store("groupId", $groupId);
      SessionUtils::store("groupName", $databaseCheck[0]["name"]);
      return true;
  }

  // exit group space

  function action_exitGroupSpace() {
      SessionUtils::remove("groupId");
      App::getRouter()->redirectTo("groupsList");
  }

  // edit groups

  function action_editNote() {
      if($this->validateEditGroup()){
            $this->getMembers();

            App::getSmarty()->assign("groupId", $this->groupId);
            App::getSmarty()->display("EditGroup.tpl");
      } else {
            $this->redirectToListView();
      }
  }

  function validateEditGroup() {
      $this->noteForm = new NoteForm();
      $v = new Validator();

      $this->noteId = $v->validateFromCleanURL(1, 
        ["required" => true, "required_message" => "System error"]);
        
      if($v->isLastOK() == false){
            return false;
      }
      
      $notes = App::getDB()->select("notes",[
        "title",
        "content",
        "category"
        ], [
            "id" => $this->noteId
        ]);
        
      if(count($notes) == 0){
            return false;
      }
      
      // There should be only one
      foreach($notes as $note) {
            $this->noteForm->title = $note["title"];
            $this->noteForm->content = $note["content"];
            $this->noteForm->category = $note["category"];
      }

      return true;
  }

  function getMembers() {

  }

  // save note

  function action_saveNote() {
      if($this->validateSaveNote()){
            $this->saveNote();
            App::getSmarty()->assign("note", $this->noteForm);
            App::getRouter()->redirectTo("editNote/".$this->noteId) ;
      } else {
            App::getSmarty()->assign("note", $this->noteForm);
            App::getRouter()->redirectTo("editNote/".$this->noteId) ;
      }
  }

  function validateSaveNote() {
        $this->noteForm = new NoteForm();
        $v = new Validator();
        
        $this->noteId = $v->validateFromRequest("id", 
        ["required" => true, "required_message" => "System error"]);
        if($v->isLastOK() == false){
            $this->redirectToListView();
        }

        $this->noteForm->text = $v->validateFromRequest("text");
        $this->noteForm->category = $v->validateFromRequest("category");

        $this->noteForm->title = $v->validateFromRequest("title", 
        ["required" => true, "required_message" => "Note must have a title"]);
        if($v->isLastOK() == false){
            return false;
        }

        return true;
  }

  function saveNote() {
      App::getDB()->update("notes", [
      "title" => $this->noteForm->title,
      "content" => $this->noteForm->text,
      "category"=> $this->noteForm->category,
      "lastModified" => date('Y-m-d H:i:s')], 
            ["id" => $this->noteId]);
  }

  // delete Note

  function action_deleteNote() {
      if($this->validateDeleteNote()){
            App::getDB()->delete("notes", [
                  "id" => $this->noteId
            ]);
        $m = new Message("Note deleted successfully", "info");
        App::getMessages()->addMessage($m);
      }
      
      App::getRouter()->forwardTo('notesList');
  }

  function validateDeleteNote() {
      $v = new Validator();

      $this->noteId = $v->validateFromCleanURL(1, 
        ["required" => true, "required_message" => "System error"]);
        
      if($v->isLastOK() == false){
            return false;
      }

      return true;
  }
}