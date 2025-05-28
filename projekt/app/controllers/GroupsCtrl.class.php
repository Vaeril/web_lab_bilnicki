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
      private $searchMember;
      private $groupForm;
      private $userSearchMail;

      private $addedMember;

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
        App::getDB()->insert("groups",[
        "name" => $this->groupForm->groupName,
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

      $databaseCheck = App::getDB()->select("groups_has_users",
      ["[><]groups" => ["groups_id" => "id"]],
      ["groups.name", "groups.owner"],
      ["AND" =>
            ["groups_id" => $groupId,
            "users_id" => SessionUtils::load("id", true)]
      ]);

      if(count( $databaseCheck) == 0){
            return false;
      }
      
      SessionUtils::store("groupId", $groupId);
      SessionUtils::store("groupName", $databaseCheck[0]["name"]);
      SessionUtils::store("groupOwner", $databaseCheck[0]["owner"]);
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
      
      $groups = App::getDB()->select("groups", 
      "*", 
      [
            "AND" =>
            [
            "id" => $this->groupForm->id,
            "owner" => SessionUtils::load("id", true)
            ]
        ]);
        
      if(count($groups) == 0){
            return false;
      }
      
      // There should be only one
      $this->groupForm->groupName = $groups[0]["name"];

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
        
      $groups = App::getDB()->select("groups", 
      "*", 
      [
            "AND" =>
            [
            "id" => $this->groupForm->id,
            "owner" => SessionUtils::load("id", true)
            ]
        ]);
        
      if(count($groups) == 0){
            return false;
      }

        return true;
  }

  function saveGroup() {
      App::getDB()->update("groups", [
      "name" => $this->groupForm->groupName],
            ["id" => $this->groupForm->id]);
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
      
      $groups = App::getDB()->select("groups", 
      "*", 
      [
            "AND" =>
            [
            "id" => $this->groupForm->id,
            "owner" => SessionUtils::load("id", true)
            ]
        ]);
        
      if(count($groups) == 0){
            return false;
      }

      $this->userSearchMail = $v->validateFromRequest("mail");

      return true;
  }

  function getAllUsers() {
      // filtering

      $search_params = ["OR" => 
            [
            "groups_has_users.groups_id[!]" => $this->groupForm->id,
            "groups_has_users.groups_id" => null
            ]
      ];

      if (isset($this->userSearchMail) && strlen($this->userSearchMail) > 0) {
            $search_params['users.mail[~]'] = $this->userSearchMail . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
      }
      $where = ["AND" => &$search_params];
      
      $members = App::getDB()->select(
      "users",
      [ "[>]groups_has_users" => ["id" => "users_id"]],
      ["users.id"], 
      $where
      );

      $members_id = [];
      foreach($members as $member) {
            $members_id[] = $member["id"];
      }

      $uniqueMembers = App::getDB()->select(
      "users",
      ["id", "mail", "role"], 
      ["id" => $members_id]
      );
      

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
      
      $groups = App::getDB()->select("groups", 
      "*", 
      [
            "AND" =>
            [
            "id" => $this->groupForm->id,
            "owner" => SessionUtils::load("id", true)
            ]
        ]);
        
      if(count($groups) == 0){
            return false;
      }

      $groupMembership = App::getDB()->select( "groups_has_users",
            "*",
            ["AND" =>
            [
                  "groups_id" => $this->groupForm->id,
                  "users_id" => $this->addedMember
            ]]);
      
      if(count($groupMembership) > 0){
            return false;
      }

      return true;
  }

  function addNewMember() {
      App::getDB()->insert("groups_has_users",
      ["groups_id" => $this->groupForm->id,
      "users_id" => $this->addedMember]);
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
      
      $groups = App::getDB()->select("groups", 
      "*", 
      [
            "AND" =>
            [
            "id" => $this->groupForm->id,
            "owner" => SessionUtils::load("id", true)
            ]
        ]);
        
      if(count($groups) == 0){
            return false;
      }

      $groupMembership = App::getDB()->select( "groups_has_users",
            "*",
            ["AND" =>
            [
                  "groups_id" => $this->groupForm->id,
                  "users_id" => $this->addedMember
            ]]);
      
      if(count($groupMembership) == 0){
            return false;
      }

      return true;
  }

  function removeMember() {
      App::getDB()->delete("groups_has_users", [
            "AND" =>
            ["groups_id" => $this->groupForm->id,
            "users_id" => $this->addedMember]
      ]);
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
      
      $groups = App::getDB()->select("groups", 
      "*", 
      [
            "AND" =>
            [
            "id" => $this->groupForm->id,
            "owner" => SessionUtils::load("id", true)
            ]
        ]);
        
      if(count($groups) == 0){
            return false;
      }

      return true;
  }

  function deleteGroup() {
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
  }
  
  /* #endregion */
}