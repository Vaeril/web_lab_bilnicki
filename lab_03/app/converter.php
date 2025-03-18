<?php
require_once dirname(__FILE__).'/../config.php';

// 1. pobranie parametrów
function getParams(&$input, &$input_type){
	$input = isset($_REQUEST['input']) ? $_REQUEST['input'] : null;
	$input_type = isset($_REQUEST['input_type']) ? $_REQUEST['input_type'] : null;
}

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate (&$input, &$input_type, &$messages){
	if ( ! (isset($input) && isset($input_type))) {
		$messages [] = 'Nie podano danych';
	}

	if (empty($messages) && $input == "") {
		$messages [] = 'Nie podano liczby';
	}

	if (empty( $messages )) {

		for($i=0; $i<strlen($input); $i++){
			if(empty ($messages)){
				$char = substr($input, $i, 1);
				switch($input_type){
					case "2":
						if($char < "0" || $char > "1")
							$messages [] = 'Liczba binarna zawiera nieodpowiednie znaki';
						break;
					case "10":
						if($char < "0" || $char > "9")
							$messages [] = 'Liczba dziesiętna zawiera nieodpowiednie znaki';
						break;
					case "16":
						if(($char < "0" || $char > "9") && ($char < "A" || $char > "F") && ($char < "a" || $char > "f"))
							$messages [] = 'Liczba szestnastkowa zawiera nieodpowiednie znaki';
						break;
				}
			}
		}
	}
	return empty($messages);
}

// 3. wykonaj zadanie jeśli wszystko w porządku
function process(&$input, &$input_type, &$messages, &$results){
	if (empty ( $messages )) { // gdy brak błędów
		switch($input_type){
		case "2":
			$binary = $input;
			$decimal = getDecimal($binary);
			$hex = getHex($binary);

			break;
		case "10":
			$decimal = $input;
			$binary = getBinary($decimal);
			$hex = getHex($binary);

			break;
		case "16":
			$hex = $input;
			$decimal = getDecimalFromHex($hex);
			$binary = getBinary($decimal);
			break;
		}

		$results [] = $binary;
		$results [] = $decimal;
		$results [] = $hex;
	}
}

// Processing functions
function getDecimal($binary) {
	$decimal = 0;
	for($i=0;$i<strlen($binary);$i++){
		$place = strlen($binary) - $i - 1;
		
		if(substr($binary, $i, 1) == "1")
			$decimal += pow(2, $place);
	}
	return $decimal;
}
function getHex($binary) {
	$hex = "";
	$hex_digit = 0;

	for($i=0;$i<strlen($binary);$i++){
		$place = strlen($binary) - $i - 1;
		
		if(substr($binary, $i, 1) == "1")
			$hex_digit += pow(2, $place % 4);
		
		if($i % 4 == (strlen($binary) + 3) % 4){
			if($hex_digit < 10)
				$hex = $hex.$hex_digit;
			else
				$hex = $hex.chr($hex_digit - 10 + ord('A'));
			$hex_digit = 0;
		}
	}
	return $hex;
}
function getBinary($decimal) {
	$binary = "";
	
	for($i=strlen($decimal)*4;$i>=0;$i--){
		if($decimal >= pow(2, $i)){
			$binary = $binary."1";
			$decimal -= pow(2, $i);
		} else
			$binary = $binary."0";
	}
	return $binary;
}
function getDecimalFromHex($hex) {
	$decimal = 0;
	
	for($i=0;$i<strlen($hex);$i++){
		$place = strlen($hex) - $i - 1;
		$char = substr($hex, $i, 1);
		if(ord($char) >= ord('0') && ord($char) <= ord('9'))
			$value = (int)$char;
		else{
			if(ord($char) <= ord('G'))
				$value = ord($char) - ord('A') + 10;
			else
				$value = ord($char) - ord('a') + 10;
		}
		
		$decimal += $value * pow(16, $place);
	}
	return $decimal;
}

// Defining variables
$input = null;
$input_type = null;
$results = array();
$messages = array();

getParams($input, $input_type);
if(validate($input, $input_type, $messages)){
	process($input, $input_type, $messages, $results);
}

// 4. Wywołanie widoku z przekazaniem zmiennych
include 'converter_view.php';

