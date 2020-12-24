<?php
    include_once '../index.php';   
    include_once 'db.php';

    //function for object generation
    function generate(){
        $pdo=connect();

        //generating class object with random ID and number
        $newNumber=new MyNumber();  

        //insert generated element into  DB table 
        $sql = $pdo->prepare("INSERT INTO mynumbers(id,number) VALUES (:id,:number)");
		$sql->bindParam(':id', $newNumber->id);
		$sql->bindParam(':number', $newNumber->number);
        $sql->execute();     

        return(['id'=>$newNumber->id,'number'=> $newNumber->number]);
    }

    //retrieve method
    function retrieve($id){    
    $myNumber=null;
    $pdo=connect();
    try{
        //get element with requested ID
	    $ps=$pdo->prepare('select * from mynumbers where id=?');
	    $ps->bindParam(1,$id);
	    if ($res=$ps->execute()) {	
		    if ($row=$ps->fetch()) {			
			    $myNumber['id']=$row['id'];
			    $myNumber['number']=$row['number'];
			    return($myNumber);
		    }
		    else{
		    http_response_code(404);
	         }
	    }		
    }
    catch(PDOException $e) {
	    echo $e->getMessage();
	return false;
    }
    }
?>