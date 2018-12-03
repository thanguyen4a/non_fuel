<?php
session_start();
include "common.php";

$common = new Common();
?>


<?php 
   $username =  $_GET["username"];
   $password =  $_GET["password"];
   $sex =  $_GET["sex"];
   $hobby_str =  $_GET["hobby_str"];
   $job = $_GET['job'];
   $avatar = $_GET['avatar'];
   
   $hobby =  unserialize($hobby_str);
   $data = $common->packData($username,$password,$sex,$hobby,$job,$avatar);



   if(!is_array ($hobby)) {
   		$hobby = array();
   }
?>
