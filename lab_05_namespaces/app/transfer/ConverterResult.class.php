<?php namespace app\transfer;
class ConverterResult{
    public $results = array();

    public function isEmpty() {
        return !(isset($this->results)) || count($this->results) == 0;
    }
    
    public function addResult($value){
        $this->results [] = $value;
    }
}