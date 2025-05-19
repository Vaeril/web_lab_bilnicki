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
    
    $this->loginForm = new LoginForm();
            App::getSmarty()->assign("loginForm", $this->loginForm);
        App::getSmarty()->display("Login.tpl");
  }

  // Register

  function validateRegister() {
    App::getMessages()->clear();

    $this->registerForm = new RegisterForm();
    $v = new Validator();
    $this->registerForm->email = $v->validateFromRequest("email", 
    ["trim" => true,
            "required" => true,
            "required_message" => 'Email is necessary',
            "email" => true,
            "validator_message" => "Use proper email adress"]);
    
            /*
    if($v->isLastOK() == false){
        return false;
    }*/

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
            "required_message" => 'Password confirmation is necessary',
            "min_length" => 4,
            "validator_message" => "Password should have at least 4 characters"]);

            
    if(!($v->isLastOK())){

        if(App::getMessages()->getNumberOfErrors() == 3){
            App::getMessages()->clear();
            return false;
        }
    }


    if($this->registerForm->password != $this->registerForm->password_2){
        $m = new Message("Passwords must match", "error");
        App::getMessages()->addMessage($m);

        return false;
    }
    
    if(!($v->isLastOK())){

        if(App::getMessages()->getNumberOfErrors() == 3)

        return false;
    }

    $this->registerForm->role = $v->validateFromRequest("role", [""]);
    if($this->registerForm->role != "admin")
        $this->registerForm->role = "user";

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
  }

  function returnToRegister() {
        App::getSmarty()->display("Register.tpl");
  }

  function redirectToLoginFromRegister(){
        $m = new Message("You are already registered", "error");
        App::getMessages()->addMessage($m);
        App::getRouter()->redirectTo("login");
  }

  // Login

  function validateLogin() {
    App::getMessages()->clear();
    $this->loginForm = new LoginForm();
    $v = new Validator();

  }

  function proceedAfterLogin() {
        SessionUtils::store("email", $this->loginForm->email);
        RoleUtils::addRole($this->loginForm->role);

        App::getRouter()->redirectTo("hello");
  }

}