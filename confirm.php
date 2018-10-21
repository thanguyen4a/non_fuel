<?php
session_start();
include "common.php";

$common = new Common();
?>


<?php 
   

   $username =  $_SESSION["username"];
   $password =  $_SESSION["password"];
   $sex =  $_SESSION["sex"];
   $hobby_str =  $_SESSION["hobby_str"];
   $job = $_SESSION['job'];
   $avatar = $_SESSION['avatar'];

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