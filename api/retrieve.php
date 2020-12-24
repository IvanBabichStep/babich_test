<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    include_once '../index.php';   
    include_once 'functions.php';

    //check for system symbols
    $id=htmlspecialchars($_GET['id']);

    $result=retrieve($id);

    //if element with required id exists in DB table
    if ($result){
    echo json_encode($result); 
    }
    else{
        http_response_code(404);
    }
?>