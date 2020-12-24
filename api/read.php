<?php
include_once('db.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$pdo=connect();

try
{	
	$mynumbers=[];
	
	//get all elements from table
	$ps=$pdo->prepare('select * from mynumbers');
	if ($res=$ps->execute())
	{
		$result=$ps->fetchAll();	
		$i=0;
		foreach ($result as $row)
		{			
			$mynumbers[$i]['id']=$row['id'];
			$mynumbers[$i]['number']=$row['number'];			
			$i++;			
		}
		echo json_encode($mynumbers);
	}
	else
	{
		http_response_code(403);
	}	
}
catch(PDOException $e) 
{
	echo $e->getMessage();
	return false;
}
?>