<?php

//include_once "../../../index.php";

class MyNumber{    

    // properties 
    public $id;
    public $number;
   
    //costructor with random generation
    public function __construct(){
        $this->id = uniqid('',true);        
        $this->number = rand(0,1000);       
    }   
}
?>