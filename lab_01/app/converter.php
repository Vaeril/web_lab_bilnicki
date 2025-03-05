<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$input = $_REQUEST['input'];
$input_type = $_REQUEST['input_type'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($input) && isset($input_type))) {

	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $input == "") {
	$messages [] = 'Nie podano liczby';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {

	for($i=0; $i<strlen($input); $i++){
		if(empty ($messages)){
			$char = substr($input, $i, 1);
			switch($input_type){
				case "2":
					if($char < "0" || $char > "1")
						$messages [] = 'Liczba zawiera nieodpowiednie znaki';
					break;
				case "10":
					if($char < "0" || $char > "9")
						$messages [] = 'Liczba zawiera nieodpowiednie znaki';
					break;
				case "16":
					if(($char < "0" || $char > "9") && ($char < "A" || $char > "F") && ($char < "a" || $char > "f"))
						$messages [] = 'Liczba zawiera nieodpowiednie znaki';
					break;
			}
		}
	}
}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów

	switch($input_type){
	case "2":
		$decimal = 0;
		$hex = "";
		$hex_digit = 0;
		
		for($i=0;$i<strlen($input);$i++){
			$place = strlen($input) - $i - 1;
			
			if(substr($input, $i, 1) == "1"){
				$decimal += pow(2, $place);
				$hex_digit += pow(2, $place % 4);
			}
			
			if($i % 4 == (strlen($input) + 3) % 4){
				if($hex_digit < 10)
					$hex = $hex.$hex_digit;
				else
					$hex = $hex.chr($hex_digit - 10 + ord('A'));
				$hex_digit = 0;
			}
		}

		break;
	case "10":
		$binary = "";
		$hex = 0;
		$decimal = (int)$input;
		
		for($i=strlen($input)*4;$i>=0;$i--){
			if($decimal >= pow(2, $i)){
				$binary = $binary."1";
				$decimal -= pow(2, $i);
			} else
				$binary = $binary."0";
		}

		break;
	case "16":
		$binary = 0;
		$decimal = 0;
		break;

	}
}

// 4. Wywołanie widoku z przekazaniem zmiennych
include 'converter_view.php';