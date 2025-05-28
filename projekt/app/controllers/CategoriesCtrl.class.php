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
        $categories = $this->getCategories(null, null);
        App::getSmarty()->assign("records", $categories);
        App::getSmarty()->assign("recordsNumber", count($categories));
    }

    function generateListView() {
        App::getSmarty()->display("CategoriesList.tpl");
    }

    // add category

    public function action_addCategory() {
        if($this->validateAddCategory()){
            $this->saveNewCategory();
            $this->redirectToList();
        } else {
            App::getSmarty()->assign("categoryForm", $this->form);
            App::getSmarty()->display("AddCategory.tpl");
        }
    }

    function validateAddCategory() {
        $this->form = new CategoryForm();
        $v = new Validator();

        $this->form->color = $v->validateFromRequest("color");

        $this->form->name = $v->validateFromRequest("name", 
        ["required" => true, "required_message" => "Category must have a name"]);
        if($v->isLastOK() == false){
            return false;
        }

        if(count($this->getCategories(null, null)) >= 20){
            $m = new Message("You can have a max of 20 categories", "error");
            App::getMessages()->addMessage($m);
            return false;
        }

        return true;
    }

    function saveNewCategory() {
        $cat_params["name"] = $this->form->name;
        $cat_params["color"] = $this->form->color;

        if(SessionUtils::load("groupId", true)){
                $cat_params['is_group_category'] = '1';
                $cat_params['owner_group'] = SessionUtils::load("groupId", true);  
        } else {
                $cat_params['is_group_category'] = '0';
                $cat_params['owner'] = SessionUtils::load("id", true);  
        }

        App::getDB()->insert("categories", $cat_params);
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
        
        $categories = $this->getCategories("id", $this->categoryId);
            
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

        $categoriesRecords = $this->getCategories("id", $newCategory);

        while(count($categoriesRecords) == 0){
            $newCategory = $newCategory - 1;
            $categoriesRecords = $this->getCategories("id", $newCategory);

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

  function getCategories($additionalTag, $additionalValue) {
    if(SessionUtils::load("groupId", true)){
            $cat_params['is_group_category'] = '1';
            $cat_params['owner_group'] = SessionUtils::load("groupId", true);  
      } else {
            $cat_params['is_group_category'] = '0';
            $cat_params['owner'] = SessionUtils::load("id", true);  
      }
      if($additionalTag != null && strlen($additionalTag) > 0){
        $cat_params[$additionalTag] = $additionalValue;
      }

      return App::getDB()->select("categories", "*", 
            ["AND" =>
                &$cat_params]
        );
  }
}