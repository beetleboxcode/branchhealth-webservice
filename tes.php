<?php 
	
$json = file_get_contents('php://input');
$obj = json_decode($json);
$profile = $obj[0];
echo "$profile";
echo json_encode($obj);


?>