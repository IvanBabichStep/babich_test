<?php

    //autoload classes from model
    $srcDir = __DIR__ . '/classes';    
    require_once $srcDir . '/MyAutoloader.php';   
    $autoloader = new MyAutoloader();     
    spl_autoload_register(array($autoloader, 'autoload'));    
    $autoloader->registerClass('MyNumber', $srcDir . '/Model/myNumber.php');  
?>