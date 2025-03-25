<?php

require_once $config->root_path.'/lib/smarty/libs/Smarty.class.php';
require_once $config->root_path.'/lib/Messages.class.php';
require_once $config->root_path.'/app/converter/ConverterResult.class.php';
require_once $config->root_path.'/app/converter/ConverterForm.class.php';


class ConverterCtrl{

    private $form;
    private $messages;
    private $result;
    
    public function __construct() {
        $this->messages = new Messages();
        $this->form = new ConverterForm();
        $this->result = new ConverterResult();
    }

    public function start() {
        $this->getParams();
        if($this->validate()){
            $this->process();
        }

        $this->generateView();
    }

    function generateView() {
        global $config;

        $smarty = new Smarty\Smarty();
        
        $smarty->assign('page_title','Konwerter');
        $smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty');
        $smarty->assign('page_header','Szablony Smarty');
        
        
        $smarty->assign('config', $config);
            
        //if(isset($this->$result)){
            $smarty->assign('result',$this->result);
        //}
        //if(isset($this->$messages)){
            $smarty->assign('messages',$this->messages);
        //}
        //if(isset($this->$form)){
            $smarty->assign('form',$this->form);
        //}
        
        // 4. Wywołanie widoku z przekazaniem zmiennych
        $smarty->display($config->root_path.'/app/converter/converter.html');
    }

    // 1. pobranie parametrów
    function getParams(){
        $this->form->input = isset($_REQUEST['input']) ? $_REQUEST['input'] : null;
        $this->form->input_type = isset($_REQUEST['input_type']) ? $_REQUEST['input_type'] : null;
    }

    // 2. walidacja parametrów z przygotowaniem zmiennych dla widoku
    function validate (){
        if ( ! (isset($this->form->input) && isset($this->form->input_type))) {
            return false;
        }

        if ($this->messages->isEmpty() && $this->form->input == "") {
            $this->messages->addError('Nie podano liczby');
        }

        if ($this->messages->isEmpty()) {

            for($i=0; $i<strlen($this->form->input); $i++){
                if($this->messages->isEmpty()){
                    $char = substr($this->form->input, $i, 1);
                    switch($this->form->input_type){
                        case "2":
                            if($char < "0" || $char > "1")
                                $this->messages->addError('Liczba binarna zawiera nieodpowiednie znaki');
                            break;
                        case "10":
                            if($char < "0" || $char > "9")
                                $this->messages->addError('Liczba dziesiętna zawiera nieodpowiednie znaki');
                            break;
                        case "16":
                            if(($char < "0" || $char > "9") && ($char < "A" || $char > "F") && ($char < "a" || $char > "f"))
                                $this->messages->addError('Liczba szestnastkowa zawiera nieodpowiednie znaki');
                            break;
                    }
                }
            }
        }
        return $this->messages->isEmpty();
    }

    // 3. wykonaj zadanie jeśli wszystko w porządku
    function process(){
        if ($this->messages->isEmpty()) { // gdy brak błędów
            switch($this->form->input_type){
                case "2":
                    $binary = $this->form->input;
                    $decimal = $this->getDecimal($binary);
                    $hex = $this->getHex($binary);

                    break;
                case "10":
                    $decimal = $this->form->input;
                    $binary = $this->getBinary($decimal);
                    $hex = $this->getHex($binary);

                    break;
                case "16":
                    $hex = $this->form->input;
                    $decimal = $this->getDecimalFromHex($hex);
                    $binary = $this->getBinary($decimal);
                    break;
            }

            $this->result->addResult($binary);
            $this->result->addResult($decimal);
            $this->result->addResult($hex);
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

}