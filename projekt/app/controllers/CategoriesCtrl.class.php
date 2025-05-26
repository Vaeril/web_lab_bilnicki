<?php

namespace app\controllers;

use core\App;
use core\SessionUtils;
use app\forms\CategoryForm;
use core\Validator;
use core\Message;
use core\Messages;

class CategoriesCtrl {

    private $form;

    private $categoryId;
    // categories list

    public function action_categoriesList() {
        $this->getRecords();
        $this->generateListView();
    }

    function getRecords() {
        $records = App::getDB()->select("categories", "*", 
            ["AND" =>
                ["is_group_category" => 0,
                "owner" => SessionUtils::load("id", true)]
        ]);
        App::getSmarty()->assign("records", $records);
    }

    function generateListView() {
        App::getSmarty()->display("CategoriesList.tpl");
    }

    // add category

    public function action_addCategory() {
        if($this->validate()){
            $this->saveNewCategory();
            $this->redirectToList();
        } else {
            App::getSmarty()->assign("categoryForm", $this->form);
            App::getSmarty()->display("AddCategory.tpl");
        }
    }

    function validate() {
        $this->form = new CategoryForm();
        $v = new Validator();

        $this->form->color = $v->validateFromRequest("color");

        $this->form->name = $v->validateFromRequest("name", 
        ["required" => true, "required_message" => "Category must have a name"]);
        if($v->isLastOK() == false){
            return false;
        }

        return true;
    }

    function saveNewCategory() {
        App::getDB()->insert("categories",[
        "name" => $this->form->name,
        "color" => $this->form->color,
        "owner" => SessionUtils::load("id", true),
        "is_group_category" => 0
        ]);
    }

    function redirectToList() {
        App::getRouter()->redirectTo("categoriesList");
    }

    // edit category

    function action_editCategory() {
      if($this->validateEditCategory()){
            App::getSmarty()->assign("categoryForm", $this->form);
            App::getSmarty()->assign("categoryId", $this->categoryId);
            App::getSmarty()->display("EditCategory.tpl");
      } else {
            $this->redirectToList();
      }
    }

    function validateEditCategory() {
        $this->form = new CategoryForm();
        $v = new Validator();

        $this->categoryId = $v->validateFromCleanURL(1, 
            ["required" => true, "required_message" => "System error"]);
            
        if($v->isLastOK() == false){
                return false;
        }
        
        $categories = App::getDB()->select("categories",[
            "name",
            "color"
            ], [
                "id" => $this->categoryId
            ]);
            
        if(count($categories) == 0){
                return false;
        }
        
        // There should be only one
        foreach($categories as $category) {
                $this->form->name = $category["name"];
                $this->form->color = $category["color"];
        }

        return true;
    }
    
    // save category

    function action_saveCategory() {
        if($this->validateSaveCategory()){
            $this->saveCategory();
            $this->redirectToList();
        } else {
            App::getSmarty()->assign("categoryForm", $this->form);
            App::getRouter()->redirectTo("editCategory/".$this->categoryId);
        }
    }

    function saveCategory() {
        App::getDB()->update("categories", [
            "name"=> $this->form->name,
            "color"=> $this->form->color],
            ["id"=> $this->categoryId]);
    }

    function validateSaveCategory() {
        $this->form = new CategoryForm();
        $v = new Validator();
        
        $this->categoryId = $v->validateFromRequest("id", 
        ["required" => true, "required_message" => "System error"]);
        if($v->isLastOK() == false){
            $this->redirectToList();
        }

        $this->form->color = $v->validateFromRequest("color");

        $this->form->name = $v->validateFromRequest("name", 
        ["required" => true, "required_message" => "Category must have a name"]);
        if($v->isLastOK() == false){
            return false;
        }

        return true;
    }

  // delete Note

  function action_deleteCategory() {
      if($this->validateDeleteCategory()){
        $this->deleteCategory();
      }
      
      App::getRouter()->forwardTo('categoriesList');
  }

  function validateDeleteCategory() {
      $v = new Validator();

      $this->categoryId = $v->validateFromCleanURL(1, 
        ["required" => true, "required_message" => "System error"]);
        
      if($v->isLastOK() == false){
            return false;
      }

      return true;
  }

  function deleteCategory() {
        $newCategory = $this->categoryId - 1;

        $database = App::getDB() -> select("categories", 
            ["name"],
            ["AND" =>
            ["id" => $newCategory,
            "owner" => SessionUtils::load("id", true),
            "is_group_category" => '0']
        ]);

        while(count($database) == 0){
            $newCategory = $newCategory - 1;
            $database = App::getDB() -> select("categories", 
                ["name"],
                ["AND" =>
                ["id" => $newCategory,
                "owner" => SessionUtils::load("id", true),
                "is_group_category" => '0']
            ]);

            if($newCategory <= 0)
                return false;
        }

        App::getDB()->update("notes", [
        "category" => $newCategory
        ], 
        ["category" => $this->categoryId]);


            App::getDB()->delete("categories", [
                  "id" => $this->categoryId
            ]);
        $m = new Message("Category deleted successfully", "info");
        App::getMessages()->addMessage($m);
  }
}