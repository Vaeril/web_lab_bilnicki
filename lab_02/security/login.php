<?php
require_once dirname(__FILE__).'/../config.php';

//pobranie parametrów
function getParamsLogin(&$form){
	$form['login'] = isset ($_REQUEST ['login']) ? $_REQUEST ['login'] : null;
	$form['password'] = isset ($_REQUEST ['password']) ? $_REQUEST ['password'] : null;
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validateLogin(&$form,&$messages){

	if ( ! (isset($form['login']) && isset($form['password']))) {
		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $form['login'] == "") {
		$messages [] = 'Nie podano loginu';
	}
	if ( $form['password'] == "") {
		$messages [] = 'Nie podano hasła';
	}

	if (empty($messages)){
        if ($form['login'] == "admin" && $form['password'] == "admin") {
            session_start();
            $_SESSION['role'] = 'admin';
            return true;
        }
        if ($form['login'] == "user" && $form['password'] == "user") {
            session_start();
            $_SESSION['role'] = 'user';
            return true;
        }
        
        $messages [] = 'Niepoprawny login lub hasło';
    }
    return false;
}

//inicjacja potrzebnych zmiennych
$form = array();
$messages = array();

// pobierz parametry i podejmij akcję
getParamsLogin($form);

if (!validateLogin($form,$messages)) {
	//jeśli błąd logowania to wyświetl formularz z tekstami z $messages
	include _ROOT_PATH.'/security/login_view.php';
} else { 
	//ok przekieruj lub "forward" na stronę główną
	
	//redirect - przeglądarka dostanie ten adres do "przejścia" na niego (wysłania kolejnego żądania)
	header("Location: "._APP_URL);
}