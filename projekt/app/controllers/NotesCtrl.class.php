<?php

namespace app\controllers;

use app\forms\NoteSearchForm;
use app\forms\NoteForm;
use core\App;
use core\SessionUtils;
use core\Validator;

class NotesCtrl {

      private $searchForm;
      private $noteForm;

  // show notes list

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
  }

  function getRecords() {
      $notesRecords = App::getDB()->select("notes", ["title", "content", "category", "creationDate", "lastModified"], 
            ["AND" =>
                ["isGroupNote" => 0,
                "owner" => SessionUtils::load("id", true)]
        ]);
      $categoriesRecords = App::getDB()->select("categories", ["name", "id"], 
            ["AND" =>
                ["is_group_category" => 0,
                "owner" => SessionUtils::load("id", true)]
        ]);

      $notes = array();
      foreach( $notesRecords as $noteRecord ) {
            $note = array();
            $note["title"] = $noteRecord["title"];
            $note["content"] = mb_strimwidth($noteRecord["content"], 0, 40, '...');
            
            foreach( $categoriesRecords as $categoryRecord ) {
                  if( $categoryRecord["id"] == $noteRecord["category"] ) {
                        $note["category"] = $categoryRecord["name"];
                  }
            }
            $unixTime = strtotime($noteRecord["creationDate"]);
            $note["creationDate"] = date("d-m-Y", $unixTime);
            $unixTime = strtotime($noteRecord["lastModified"]);
            $note["lastModified"] = date("d-m-Y", $unixTime);
            $notes[] = $note;
      }

      App::getSmarty()->assign("records", $notes);
  }

  function generateListView() {
        App::getSmarty()->display("NotesList.tpl");
  }

  // add note

  public function action_addNote() {
      $categories = App::getDB()->select("categories", ["name", "id"], 
            ["AND" =>
                ["is_group_category" => 0,
                "owner" => SessionUtils::load("id", true)]
        ]);
      App::getSmarty()->assign("categories", $categories);

      if($this->validateAddingNote()){
            $this->saveNote();
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

  function saveNote() {
        App::getDB()->insert("notes",[
        "title" => $this->noteForm->title,
        "content" => $this->noteForm->text,
        "owner" => SessionUtils::load("id", true),
        "isGroupNote" => 0,
        "category" => $this->noteForm->category,
        "creationDate" => date('Y-m-d H:i:s'),
        "lastModified" => date('Y-m-d H:i:s')
        ]);
  }

  function returnToAddNote() {
        App::getSmarty()->display("AddNote.tpl");
  }

  function redirectToListView() {
      App::getRouter()->redirectTo("notesList");
  }
}