<?php

namespace app\controllers;

use app\forms\NoteSearchForm;
use app\forms\NoteForm;
use core\App;
use core\SessionUtils;
use core\Validator;
use core\Message;
use core\Messages;

class NotesCtrl {

      private $searchForm;
      private $noteForm;
      private $noteId;
      private $currentPage = 0;
      private $lastPage = 0;

  /* #region show notes list */

  public function action_notesList() {
      $this->validateList();
      $this->getRecords();
      $this->generateListView();
  }

  function validateList() {
      $this->searchForm = new NoteSearchForm();
      $v = new Validator();
      $this->searchForm->title = $v->validateFromRequest("title");
      $this->searchForm->category = $v->validateFromRequest("category");
      $this->currentPage = $v->validateFromRequest(param_name: "page");
      if($this->currentPage == null){
            $this->currentPage = 0;
      }
  }

  function getRecords() {
      $notes = array();
      try{
            // filtering from title and category
            
            $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
            if (isset($this->searchForm->title) && strlen($this->searchForm->title) > 0) {
                  $search_params['title[~]'] = $this->searchForm->title . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
            }
            if (isset($this->searchForm->category) && $this->searchForm->category >= 0) {
                  $search_params['category'] = $this->searchForm->category;
            }

            if(SessionUtils::load("groupId", true)){
                  $search_params['isGroupNote'] = '1';
                  $search_params['notes.owner_group'] = SessionUtils::load("groupId", true);  
            } else {
                  $search_params['isGroupNote'] = '0';
                  $search_params['notes.owner'] = SessionUtils::load("id", true);  
            }

            $where = ["AND" => &$search_params];
            $this->lastPage = App::getDB()->count("notes", $where) / 30;

            $where = ["AND" => &$search_params, "LIMIT" => [$this->currentPage*30, 30], "ORDER" => ['lastModified' => 'DESC']];
            $notesRecords = App::getDB()->select("notes", 
                  [
                        "[>]categories" => ["category" => "id"]
                  ],
            ["title", "content", "category", "creationDate", "lastModified", "notes.id", "categories.name"], 
                  $where);

            $categoriesRecords = $this->getCategories();

            foreach( $notesRecords as $noteRecord ) {
                  $note = array();
                  $note["title"] = $noteRecord["title"];
                  $note["content"] = mb_strimwidth($noteRecord["content"], 0, 40, '...');
                  $note['category'] = $noteRecord['name'];
                  $unixTime = strtotime($noteRecord["creationDate"]);
                  $note["creationDate"] = date("d-m-Y", $unixTime);
                  $unixTime = strtotime($noteRecord["lastModified"]);
                  $note["lastModified"] = date("d-m-Y", $unixTime);
                  $note["id"] = $noteRecord["id"];
                  $notes[] = $note;
            }
      } catch (\PDOException $e) {
            $m = new Message("Connection error", "error");
            App::getMessages()->addMessage($m);
      }

      App::getSmarty()->assign("searchForm", $this->searchForm);
      App::getSmarty()->assign("records", $notes);
      App::getSmarty()->assign("page", $this->currentPage);
      App::getSmarty()->assign("lastPage", $this->lastPage);
      App::getSmarty()->assign("categories", $categoriesRecords);
  }

  function generateListView() {
        App::getSmarty()->display("NotesList.tpl");
  }

  /* #endregion */
  
  /* #region add note */

  public function action_addNote() {
      App::getSmarty()->assign("categories", $this->getCategories());

      if($this->validateAddingNote()){
            $this->saveNewNote();
            $this->redirectToListView();
      } else {
            $this->returnToAddNote();
      }
  }

  function validateAddingNote() {
        $this->noteForm = new NoteForm();
        $v = new Validator();

        $this->noteForm->title = $v->validateFromRequest("title", 
        ["required" => true, "required_message" => "Note must have a title"]);
        if($v->isLastOK() == false){
            return false;
        }

        $this->noteForm->text = $v->validateFromRequest("text");
        $this->noteForm->category = $v->validateFromRequest("category");

        return true;
  }

  function saveNewNote() {
        $params["title"] = $this->noteForm->title;
        $params["content"] = $this->noteForm->text;
        $params["category"] = $this->noteForm->category;
        $params["creationDate"] = date('Y-m-d H:i:s');
        $params["lastModified"] = date('Y-m-d H:i:s');

        if(SessionUtils::load("groupId", true)){
                $params['isGroupNote'] = '1';
                $params['owner_group'] = SessionUtils::load("groupId", true);  
        } else {
                $params['isGroupNote'] = '0';
                $params['owner'] = SessionUtils::load("id", true);  
        }
      try{
        App::getDB()->insert("notes", $params);
      } catch (\PDOException $e) {
            $m = new Message("Connection error", "error");
            App::getMessages()->addMessage($m);
      }
  }

  function returnToAddNote() {
        App::getSmarty()->display("AddNote.tpl");
  }

  function redirectToListView() {
      App::getRouter()->redirectTo("notesList");
  }

  /* #endregion */
  
  /* #region edit note */

  function action_editNote() {
      if($this->validateEditNote()){
            App::getSmarty()->assign("categories", $this->getCategories());

            App::getSmarty()->assign("note", $this->noteForm);
            App::getSmarty()->assign("noteId", $this->noteId);
            App::getSmarty()->display("EditNote.tpl");
      } else {
            $this->redirectToListView();
      }
  }

  function validateEditNote() {
      $this->noteForm = new NoteForm();
      $v = new Validator();

      $this->noteId = $v->validateFromCleanURL(1, 
        ["required" => true, "required_message" => "System error"]);
        
      if($v->isLastOK() == false){
            return false;
      }
      
      $params = [];
      if(SessionUtils::load("groupId", true)){
            $params['isGroupNote'] = '1';
            $params['owner_group'] = SessionUtils::load("groupId", true);  
      } else {
            $params['isGroupNote'] = '0';
            $params['owner'] = SessionUtils::load("id", true);  
      }
      $params["id"] = $this->noteId;

      try{
            $notes = App::getDB()->get("notes",[
            "title",
            "content",
            "category"
            ], [
                  "AND" =>
                  $params
            ]);
            
            if($notes == null){
                  return false;
            }
      } catch (\PDOException $e) {
            $m = new Message("Connection error", "error");
            App::getMessages()->addMessage($m);
            return false;
      }

      $this->noteForm->title = $notes["title"];
      $this->noteForm->content = $notes["content"];
      $this->noteForm->category = $notes["category"];
      return true;
  }

  /* #endregion */
  
  /* #region save note */

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
      try{
            App::getDB()->update("notes", [
            "title" => $this->noteForm->title,
            "content" => $this->noteForm->text,
            "category"=> $this->noteForm->category,
            "lastModified" => date('Y-m-d H:i:s')], 
                  ["id" => $this->noteId]);
      } catch (\PDOException $e) {
            $m = new Message("Connection error", "error");
            App::getMessages()->addMessage($m);
      }
  }

  /* #endregion */
  
  /* #region delete note */

  function action_deleteNote() {
      try{
            if($this->validateDeleteNote()){
                  App::getDB()->delete("notes", [
                        "id" => $this->noteId
                  ]);
            $m = new Message("Note deleted successfully", "info");
            App::getMessages()->addMessage($m);
            }
      } catch (\PDOException $e) {
            $m = new Message("Connection error", "error");
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

  function getCategories() {
      if(SessionUtils::load("groupId", true)){
            $cat_params['is_group_category'] = '1';
            $cat_params['owner_group'] = SessionUtils::load("groupId", true);  
      } else {
            $cat_params['is_group_category'] = '0';
            $cat_params['owner'] = SessionUtils::load("id", true);  
      }
      try{
            return App::getDB()->select("categories", ["name", "id"], 
                  ["AND" =>
                  &$cat_params]
            );
      } catch (\PDOException $e) {
            $m = new Message("Connection error", "error");
            App::getMessages()->addMessage($m);
      }
  }
  
  /* #endregion */
}