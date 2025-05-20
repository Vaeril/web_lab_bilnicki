<?php

namespace app\controllers;

use core\App;
use core\SessionUtils;
use app\forms\CategoryForm;
use core\Validator;

class CategoriesCtrl {

    private $form;
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
            $this->saveCategory();
            $this->redirectToList();
        } else {
            App::getSmarty()->assign("categoryForm", $this->form);
            App::getSmarty()->display("AddCategory.tpl");
        }
    }

    function validate() {
        $this->form = new CategoryForm();
        $v = new Validator();

        $this->form->name = $v->validateFromRequest("name", 
        ["required" => true, "required_message" => "Category must have a name"]);
        if($v->isLastOK() == false){
            return false;
        }

        $this->form->color = $v->validateFromRequest("color");

        return true;
    }

    function saveCategory() {
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

    
}