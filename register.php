<?php
session_start();
include "common.php";
include "connection.php";
$common = new Common();
$connection = new Connection();
?>


<?php 

if (isset($_POST) && (isset($_POST["input"]) || isset($_POST["confirm"]))){

   	if(isset($_POST["input"])) {

   		$username = $_POST["username"];
		$password = $_POST["password"];
		$sex = $_POST["sex"];

		if(isset($_POST["hobby"])) {
			$hobby = $_POST["hobby"];
		} else {
			$hobby = -1;
		}
	
		$hobby_str = serialize($hobby);
		$common->saveTmpFile($_FILES['up_file']);

		$job = $_POST["job"];
		$avatar = $_FILES['up_file']['name'];
		$data = $common->packData($username,$password,$sex,$hobby,$job,$avatar);
		include("template/confirm.php"); 
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
		$result = $connection->insert($username,$password,$sex,$hobby_str,$job,$avatar);
   		include("template/complete.php"); 
   }

  //  if (isset($_POST["back"])){
  //  		$data = base64_decode($_POST["data"]);
		// $data = unserialize($data);


		// $username = $data ["username"];
		// $password = $data ["password"];
		// $sex = $data ["sex"];
		// $hobby = $data ["hobby"];
		// $job = $data ["job"];
		// $avatar = $data ["avatar"];
		// $hobby_str = serialize($hobby);

		// $result = $connection->insert($username,$password,$sex,$hobby_str,$job,$avatar);

  //  		include("template/input.php"); 
  //  }


} else {
	include("template/input.php"); 
}



?>



