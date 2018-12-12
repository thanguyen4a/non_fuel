<?php
session_start();
include "common.php";
include "connection.php";
include "validation.php";
$common = new Common();
$connection = new Connection();

?>


<?php 

if (isset($_POST) && (isset($_POST["input"]) || isset($_POST["confirm"]) || isset($_POST["back"]))){

   	if(isset($_POST["input"])) {

   		
   		$data = array_merge($_POST,$_FILES);
   		$validation = new Validation($data);

   		$errors = $validation->run();


   		$username = $_POST["username"];
		$password = $_POST["password"];
		$sex = $_POST["sex"];

		if(isset($_POST["hobby"])) {
			$hobby = $_POST["hobby"];
		} else {
			$hobby = -1;
		}


	
		$hobby_str = serialize($hobby);
		$avatar = "";
		if(isset($_FILES['up_file'])) {
			$common->saveTmpFile($_FILES['up_file']);
			$avatar = $_FILES['up_file']['name'];
		}
		

		$job = $_POST["job"];
		
		$data = $common->packData($username,$password,$sex,$hobby,$job,$avatar);

		if(count($errors)>0) 
		{
			include("template/input.php"); 
		} else {
			include("template/confirm.php"); 
		}
   }

   if (isset($_POST["confirm"])){
   		$data = base64_decode($_POST["data"]);
		$data = unserialize($data);
		$username = $data ["username"];
		$password = $data ["password"];
		$sex = $data ["sex"];
		$hobby = $data ["hobby"];
		$job = $data ["job"];
		$avatar = $data ["avatar"];
		$hobby_str = serialize($hobby);
		$result = $connection->insert($username,$password,$sex,$hobby_str,$job,$avaatr);
   		include("template/complete.php"); 
   }


   if (isset($_POST["back"])){
   		$data = base64_decode($_POST["data"]);
		$data = unserialize($data);

		$username = $data ["username"];
		$password = $data ["password"];
		$sex = $data ["sex"];
		$hobby = $data ["hobby"];
		$job = $data ["job"];
		$avatar = "";
		$hobby_str = serialize($hobby);
   		include("template/input.php"); 
   }


} else {
	include("template/input.php"); 
}



?>



