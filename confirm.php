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

   echo "UserName : ". $username . "</br>";
   echo "Password : ". $password . "</br>";;
   echo "Sex : ". $common->convertIntToSexString($sex) . "</br>";
   echo "Hobby : ". $common->getPrintHobbyStr($hobby_str). "</br>";
   echo "Job : ".$common->convertIntToJobString($job). "</br>";
   $full_path = $common->getAvatarPath($avatar);
   echo "Avatar : "; $common->printAvatar($full_path). "</br>";
?>
<form action="success.php" method="post">
<input type="hidden" name="data" value="<?php echo $data;?>">
<input type="submit" value="Register">
</form>