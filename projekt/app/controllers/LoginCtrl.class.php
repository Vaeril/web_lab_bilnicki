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

class LoginCtrl {

    private $registerForm;
    private $loginForm;

  public function action_register() {
        if($this->validateRegister()){
            $this->saveNewUser();
            $this->proceedAfterLogin();
        } else {
            App::getSmarty()->assign("registerForm", $this->registerForm);
            App::getSmarty()->display("Register.tpl");
        }
  }

  public function action_login() {
    if($this->validateLogin()){
        $this->proceedAfterLogin();
    } else {
        App::getSmarty()->assign("loginForm", $this->loginForm);
        App::getSmarty()->display("Login.tpl");
    }
  }

  // Register

  function validateRegister() {

    $this->registerForm = new RegisterForm();
    $v = new Validator();

    // Did user even provided some mail?
    $this->registerForm->email = $v->validateFromRequest("email", ["required" => true]);
    if($v->isLastOK() == false){
        App::getMessages()->clear();
        return false;
    }
    App::getMessages()->clear();

    $this->registerForm->email = $v->validateFromRequest("email", 
    ["trim" => true,
            "required" => true,
            "required_message" => 'Email is necessary',
            "email" => true,
            "validator_message" => "Use proper email adress"]);

    $database_user = App::getDB()->select("users", "*", ["mail" => $this->registerForm->email]);
    if(count($database_user) > 0){
        $this->redirectToLoginFromRegister();
    }

    $this->registerForm->password = $v->validateFromRequest("password",
            ["required" => true,
            "required_message" => 'Password is necessary',
            "min_length" => 4,
            "validator_message" => "Password should have at least 4 characters"]);

    $this->registerForm->password_2 = $v->validateFromRequest("password_2",
            ["required" => true,
            "required_message" => 'Password confirmation is necessary']);

    if($this->registerForm->password != $this->registerForm->password_2){
        $m = new Message("Passwords must match", "error");
        App::getMessages()->addMessage($m);

        return false;
    }
    
    if(!($v->isLastOK())){
        return false;
    }

    $this->registerForm->role = $v->validateFromRequest("role", [""]);
    if($this->registerForm->role != "lead"){
        $this->registerForm->role = "user";
    }
    
    $this->loginForm = new LoginForm();
    $this->loginForm->email = $this->registerForm->email;
    $this->loginForm->role = $this->registerForm->role;

    return true;
  }

  function saveNewUser() {
        App::getDB()->insert("users",[
        "mail" => $this->registerForm->email,
        "password" => $this->registerForm->password,
        "role" => $this->registerForm->role
        ]);
        
        $database_user = App::getDB()->select("users", "*", ["mail" => $this->registerForm->email]);
        foreach($database_user as $user){
            $this->loginForm->id = $database_user["id"];
        }

        App::getDB()->insert("categories",[
        "name" => "no category",
        "color" => "red",
        "owner" => $this->loginForm->id,
        "is_group_category" => 0
        ]);
  }

  function returnToRegister() {
        App::getSmarty()->display("Register.tpl");
  }

  function redirectToLoginFromRegister(){
        $m = new Message("You are already registered", "error");
        App::getMessages()->addMessage($m);
        
        $this->loginForm = new LoginForm();
        $this->loginForm->email = $this->registerForm->email;
        App::getSmarty()->assign("loginForm", $this->loginForm);
        App::getRouter()->redirectTo("login");
  }

  // Login

  function validateLogin() {
    $this->loginForm = new LoginForm();
    $v = new Validator();
    
    $this->loginForm->email = $v->validateFromRequest("email", ["required" => true]);
    if($v->isLastOK() == false){
        App::getMessages()->clear();
        return false;
    }

    App::getMessages()->clear();
    $this->loginForm->email = $v->validateFromRequest("email", 
    ["trim" => true,
            "required" => true,
            "required_message" => 'Provide email']);
            
    if(!($v->isLastOK())){
        return false;
    }

    $database_user = App::getDB()->select("users", "*", ["mail" => $this->loginForm->email]);
    if(count($database_user) == 0){
        $m = new Message("There is no such user", "error");
        App::getMessages()->addMessage($m);
        return false;
    }

    $this->loginForm->password = $v->validateFromRequest("password",
            ["required" => true,
            "required_message" => 'Provide password']);
            
    
    if(!($v->isLastOK())){
        return false;
    }


    $database_user = App::getDB()->select("users", "*", ["mail" => $this->loginForm->email, "password" => $this->loginForm->password]);
    if(count($database_user) == 0){
        $m = new Message("Password incorrect", "error");
        App::getMessages()->addMessage($m);
        return false;
    } else {
        foreach($database_user as $user){
            $this->loginForm->role = $user["role"];
            $this->loginForm->id = $user["id"];
        }
    }
    return true;
  }

  function proceedAfterLogin() {
        SessionUtils::store("email", $this->loginForm->email);
        SessionUtils::store("id", $this->loginForm->id);
        RoleUtils::addRole($this->loginForm->role);

        $this->action_redirect();
  }

  // logout

  function action_logout(){
    session_destroy();
    App::getRouter()->redirectTo("login");
  }

  // redirect

  function action_redirect(){
        if(RoleUtils::inRole("user")){
            App::getRouter()->redirectTo("notesList");
        } else {
            App::getRouter()->redirectTo("notesList");
        }
  }
}