<?php namespace core;
class Messages {
    public $messages = array ();
    public $infos = array ();
    private $num = 0;

    public function addError($message){
        $this->messages [] = $message;
        $this->num ++;
    }
    public function addInfo($message){
        $this->infos [] = $message;
        $this->num ++;
    }
    public function isEmpty(){
        return $this->num == 0;
    }
    public function hasError(){
        return count($this->messages) > 0;
    }
    public function hasInfo(){
        return count($this->infos) > 0;
    }
    public function getErrors(){
        return $this->messages;
    }
    public function getInfos(){
        return $this->infos;
    }

    public function clear() {
        $this->errors = array();
        $this->infos = array();
        $this->num = 0;
    }
}