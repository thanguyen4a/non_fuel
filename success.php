<?php
include "connection.php";
$connection = new Connection();


if(isset($_POST) && isset($_POST["data"])){
	$data = base64_decode($_POST["data"]);
	$data = unserialize($data);


	$username = $data ["username"];
	$password = $data ["password"];
	$sex = $data ["sex"];
	$hobby = $data ["hobby"];
	$hobby_str = serialize($hobby);

	$result = $connection->insert($username,$password,$sex,$hobby_str);


	if ($result == TRUE) {
	    echo "New record created successfully"; 
	}else{
		echo "New record created not successfully";
	}
}
?>