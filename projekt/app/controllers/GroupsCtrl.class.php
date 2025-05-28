<?php

namespace app\controllers;

use app\forms\GroupForm;
use core\App;
use core\SessionUtils;
use core\Validator;
use core\Message;
use core\Messages;

class GroupsCtrl {

      private $searchName;
      private $searchOwner;
      private $groupForm;
      private $userSearchMail;
      private $addedMember;
      private $currentPage = 0;
      private $lastPage = 0;

  /* #region show groups list */

  public function action_groupsList() {
      $this->validateList();
      $this->getRecords();
      $this->generateListView();
  }

  function validateList() {
      $this->searchName = "";
      $v = new Validator();
      $this->searchName = $v->validateFromRequest("name");
      $this->searchOwner = $v->validateFromRequest("owner");
      $this->currentPage = $v->validateFromRequest("page");
      if($this->currentPage == null){
            $this->currentPage = 0;
      }

      App::getSmarty()->assign("searchName", $this->searchName);
      App::getSmarty()->assign("searchOwner", $this->searchOwner);
  }

  function getRecords() {
      try{
            // filtering from title and category
            
            $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
            if (isset($this->searchName) && strlen($this->searchName) > 0) {
                  $search_params['groups.name[~]'] = $this->searchName . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
            }
            if (isset($this->searchOwner) && strlen($this->searchOwner) > 0) {
                  $search_params['users.mail[~]'] = $this->searchOwner . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
            }
            $search_params['groups_has_users.users_id'] = SessionUtils::load("id", true); 

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
            ], $where);
            $this->lastPage = count($database) / 9;

            $where = ["AND" => &$search_params, "LIMIT" => [$this->currentPage*9, 9]];
            $database = App::getDB()->select("groups",
            [
                  "[><]groups_has_users" => ["id" => "groups_id"],
                  "[><]users" => ["owner" => "id"]
            ], [
                  "groups.id",
                  "groups.name",
                  "groups.owner",
                  "users.mail"
            ], $where);
      } catch (\PDOException $e) {
      $m = new Message("Connection error", "error");
      App::getMessages()->addMessage($m);
      }
      

      App::getSmarty()->assign("records", $database);
      App::getSmarty()->assign("page", $this->currentPage);
      App::getSmarty()->assign("lastPage", $this->lastPage);
  }

  function generateListView() {
        App::getSmarty()->display("GroupsList.tpl");
  }

  /* #endregion */
  
  /* #region add group */

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
        $this->groupForm = new GroupForm();

        $this->groupForm->groupName = $v->validateFromRequest("name", 
        ["required" => true]);
        if($v->isLastOK() == false){
            App::getMessages()->clear();
            return false;
        }

        return true;
  }

  function saveNewGroup() {
            try{
            App::getDB()->insert("groups",[
            "name" => $this->groupForm->groupName,
            "owner" => SessionUtils::load("id", true)
            ]);

            $groups = App::getDB()->select("groups", ["id"], 
            ["owner" => SessionUtils::load("id", true)]);

            $lastGroupId = $groups[count($groups)-1]["id"];

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
        } catch (\PDOException $e) {
            $m = new Message("Connection error", "error");
            App::getMessages()->addMessage($m);
        }
  }

  function returnToAddGroup() {
        App::getSmarty()->display("AddGroup.tpl");
  }

  function redirectToListView() {
      App::getRouter()->redirectTo("groupsList");
  }

  /* #endregion */
  
  /* #region enter group space */

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

      try{
            $databaseCheck = App::getDB()->get("groups_has_users",
            ["[><]groups" => ["groups_id" => "id"]],
            ["groups.name", "groups.owner"],
            ["AND" =>
                  ["groups_id" => $groupId,
                  "users_id" => SessionUtils::load("id", true)]
            ]);

            if($databaseCheck == null){
                  return false;
            }
      } catch (\PDOException $e) {
            $m = new Message("Connection error", "error");
            App::getMessages()->addMessage($m);
      }
      
      SessionUtils::store("groupId", $groupId);
      SessionUtils::store("groupName", $databaseCheck["name"]);
      SessionUtils::store("groupOwner", $databaseCheck["owner"]);
      return true;
  }

  /* #endregion */
  
  /* #region exit group space */

  function action_exitGroupSpace() {
      SessionUtils::remove("groupId");
      SessionUtils::remove("groupName");
      SessionUtils::remove("groupOwner");
      App::getRouter()->redirectTo("groupsList");
  }

  /* #endregion */
  
  /* #region edit groups */

  function action_editGroup() {
      if($this->validateEditGroup()){
            $this->getMembers();
            App::getSmarty()->assign("form", $this->groupForm);
            App::getSmarty()->display("EditGroup.tpl");
      } else {
            $this->redirectToListView();
      }
  }

  function validateEditGroup() {
      $v = new Validator();
      $this->groupForm = new GroupForm();

      $this->groupForm->id = $v->validateFromCleanURL(1, 
        ["required" => true, "required_message" => "System error"]);
        
      if($v->isLastOK() == false){
            return false;
      }
        try{
      
            $groups = App::getDB()->get("groups", 
            "*", 
            [
                  "AND" =>
                  [
                  "id" => $this->groupForm->id,
                  "owner" => SessionUtils::load("id", true)
                  ]
            ]);
            
            if($groups == null){
                  return false;
            }
        } catch (\PDOException $e) {
            $m = new Message("Connection error", "error");
            App::getMessages()->addMessage($m);
            return false;
        }
      
      // There should be only one
      $this->groupForm->groupName = $groups["name"];

      return true;
  }

  function getMembers() {
      $members = App::getDB()->select("groups",
      [
            "[><]groups_has_users" => ["id" => "groups_id"],
            "[><]users" => ["groups_has_users.users_id" => "id"]
      ], [
            "users.id",
            "users.mail",
            "groups.owner"
      ], ["groups_has_users.groups_id" => $this->groupForm->id]);
      App::getSmarty()->assign("records", $members);
  }

  /* #endregion */
  
  /* #region save group */

  function action_saveGroup() {
      if($this->validateSaveGroup()){
            $this->saveGroup();
            App::getSmarty()->assign("form", $this->groupForm);
            App::getRouter()->redirectTo("editGroup/".$this->groupForm->id) ;
      } else {
            App::getSmarty()->assign("form", $this->groupForm);
            App::getRouter()->redirectTo("editGroup/".$this->groupForm->id) ;
      }
  }

  function validateSaveGroup() {
        $v = new Validator();
        $this->groupForm = new GroupForm();
        
        $this->groupForm->id = $v->validateFromRequest("id", 
        ["required" => true, "required_message" => "System error"]);
        if($v->isLastOK() == false){
            $this->redirectToListView();
        }

        $this->groupForm->groupName = $v->validateFromRequest("name", 
        ["required" => true, "required_message" => "Group must have a name"]);
        if($v->isLastOK() == false){
            return false;
        }
        
        try{
            if(!App::getDB()->has("groups",
            [
                  "AND" =>
                  [
                  "id" => $this->groupForm->id,
                  "owner" => SessionUtils::load("id", true)
                  ]
            ])){
                  return false;
            }
        } catch (\PDOException $e) {
            $m = new Message("Connection error", "error");
            App::getMessages()->addMessage($m);
            return false;
        }

        return true;
  }

  function saveGroup() {
        try{
            App::getDB()->update("groups", [
            "name" => $this->groupForm->groupName],
                  ["id" => $this->groupForm->id]);
        } catch (\PDOException $e) {
            $m = new Message("Connection error", "error");
            App::getMessages()->addMessage($m);
        }
  }

  /* #endregion */
  
  /* #region choose member */

  function action_chooseMember() {
      if($this->validateChooseMember()){
            $this->getAllUsers();
            App::getSmarty()->assign("searchMail", $this->userSearchMail);
            App::getSmarty()->assign("form", $this->groupForm);
            App::getSmarty()->display("ChooseMember.tpl");
      } else {
            $this->redirectToListView();
      }
  }

  function validateChooseMember() {
      $v = new Validator();
      $this->groupForm = new GroupForm();
      
      $this->groupForm->id = $v->validateFromRequest("id", 
      ["required" => true, "required_message" => "System error"]);

      if($v->isLastOK() == false){
            return false;
      }
      try{
            if(!App::getDB()->has("groups",
            [
                  "AND" =>
                  [
                  "id" => $this->groupForm->id,
                  "owner" => SessionUtils::load("id", true)
                  ]
            ])){
                  return false;
            }
      } catch (\PDOException $e) {
      $m = new Message("Connection error", "error");
      App::getMessages()->addMessage($m);
      return false;
      }

      $this->userSearchMail = $v->validateFromRequest("mail");
      $this->currentPage = $v->validateFromRequest("page");
      if($this->currentPage == null){
            $this->currentPage = 0;
      }

      return true;
  }

  function getAllUsers() {
      try{
            // filtering

            $members = App::getDB()->select(
            "groups_has_users",
            ["users_id"], 
            ["groups_id" => $this->groupForm->id]
            );
            
            $members_id = [];
            foreach($members as $member) {
                  $members_id[] = $member["users_id"];
            }

            $search_params = [];
            if (isset($this->userSearchMail) && strlen($this->userSearchMail) > 0) {
                  $search_params['mail[~]'] = $this->userSearchMail . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
            }
            $search_params['id[!]'] = $members_id;
            $where = ["AND" => &$search_params];

            $uniqueMembers = App::getDB()->select(
            "users",
            ["id", "mail", "role"], 
            $where
            );
            $this->lastPage = count($uniqueMembers) / 21;
            
            $where = ["AND" => &$search_params, "LIMIT" => [$this->currentPage*21, 21]];
            $uniqueMembers = App::getDB()->select(
            "users",
            ["id", "mail", "role"], 
            $where
            );
      } catch (\PDOException $e) {
            $m = new Message("Connection error", "error");
            App::getMessages()->addMessage($m);
      }

      App::getSmarty()->assign("page", $this->currentPage);
      App::getSmarty()->assign("lastPage", $this->lastPage);
      App::getSmarty()->assign("records", $uniqueMembers);
  }

  /* #endregion */
  
  /* #region add member */

  function action_addMember() {
      if($this->validateAddMember()){
            $this->addNewMember();
            $this->redirectToEditGroup();
      } else {
            $this->redirectToEditGroup();
      }
  }

  function validateAddMember() {
      $v = new Validator();
      $this->groupForm = new GroupForm();
      
      $this->groupForm->id = $v->validateFromCleanURL(1, 
      ["required" => true, "required_message" => "System error"]);

      if($v->isLastOK() == false){
            $this->redirectToEditGroup();
      }
      
      $this->addedMember = $v->validateFromCleanURL(2, 
      ["required" => true, "required_message" => "System error"]);

      if($v->isLastOK() == false){
            return false;
      }
      
      try{
            if(!App::getDB()->has("groups",
            [
                  "AND" =>
                  [
                  "id" => $this->groupForm->id,
                  "owner" => SessionUtils::load("id", true)
                  ]
            ])){
                  return false;
            }

            if(App::getDB()->has( "groups_has_users",
                  ["AND" =>
                  [
                        "groups_id" => $this->groupForm->id,
                        "users_id" => $this->addedMember
                  ]])) {
                  return false;
            }
      } catch (\PDOException $e) {
            $m = new Message("Connection error", "error");
            App::getMessages()->addMessage($m);
            return false;
      }

      return true;
  }

  function addNewMember() {
      try{  
            App::getDB()->insert("groups_has_users",
            ["groups_id" => $this->groupForm->id,
            "users_id" => $this->addedMember]);
      } catch (\PDOException $e) {
            $m = new Message("Connection error", "error");
            App::getMessages()->addMessage($m);
      }
  }

  function redirectToEditGroup() {
      App::getRouter()->redirectTo("editGroup/".$this->groupForm->id);
  }
  
  /* #endregion */
  
  /* #region delete member */

  function action_removeMember() {
      if($this->validateRemoveMember()){
            $this->removeMember();
            $this->redirectToEditGroup();
      } else {
            $this->redirectToEditGroup();
      }
  }

  function validateRemoveMember() {
      $v = new Validator();
      $this->groupForm = new GroupForm();
      
      $this->groupForm->id = $v->validateFromCleanURL(1, 
      ["required" => true, "required_message" => "System error"]);

      if($v->isLastOK() == false){
            $this->redirectToListView();
      }
      
      $this->addedMember = $v->validateFromCleanURL(2, 
      ["required" => true, "required_message" => "System error"]);

      if($v->isLastOK() == false){
            return false;
      }
      
      try{
            if(!App::getDB()->has("groups", 
            [
                  "AND" =>
                  [
                  "id" => $this->groupForm->id,
                  "owner" => SessionUtils::load("id", true)
                  ]
            ])){
                  return false;
            }

            if(!App::getDB()->has( "groups_has_users",
                  ["AND" =>
                  [
                        "groups_id" => $this->groupForm->id,
                        "users_id" => $this->addedMember
                  ]])){
                  return false;
            }
      } catch (\PDOException $e) {
            $m = new Message("Connection error", "error");
            App::getMessages()->addMessage($m);
            return false;
      }

      return true;
  }

  function removeMember() {
      
      try{
            App::getDB()->delete("groups_has_users", [
                  "AND" =>
                  ["groups_id" => $this->groupForm->id,
                  "users_id" => $this->addedMember]
            ]);
      } catch (\PDOException $e) {
            $m = new Message("Connection error", "error");
            App::getMessages()->addMessage($m);
      }
  }
  
  /* #endregion */
  
  /* #region delete group */

  function action_deleteGroup() {
      if($this->validateDeleteGroup()){
            $this->deleteGroup();
            $this->redirectToListView();
      } else {
            $this->redirectToListView();
      }
  }

  function validateDeleteGroup() {
      $v = new Validator();
      $this->groupForm = new GroupForm();
      
      $this->groupForm->id = $v->validateFromRequest("id", 
      ["required" => true, "required_message" => "System error"]);

      if($v->isLastOK() == false){
            $this->redirectToListView();
      }
      
      try{
            if(!App::getDB()->has("groups", 
            [
                  "AND" =>
                  [
                  "id" => $this->groupForm->id,
                  "owner" => SessionUtils::load("id", true)
                  ]
            ])){
                  return false;
            }
      } catch (\PDOException $e) {
            $m = new Message("Connection error", "error");
            App::getMessages()->addMessage($m);
                  return false;
      }

      return true;
  }

  function deleteGroup() {
      try{
            App::getDB()->delete("groups_has_users", [
                  "groups_id" => $this->groupForm->id
            ]);
            App::getDB()->delete("notes", where: [
                  "AND" =>
                  ["isGroupNote" => 1,
                  "owner_group" => $this->groupForm->id]
            ]);
            App::getDB()->delete("categories", [
                  "AND" =>
                  ["is_group_category" => 1,
                  "owner_group" => $this->groupForm->id]
            ]);
            App::getDB()->delete("groups",
            ["id" => $this->groupForm->id]);
      } catch (\PDOException $e) {
            $m = new Message("Connection error", "error");
            App::getMessages()->addMessage($m);
      }
  }
  
  /* #endregion */
}