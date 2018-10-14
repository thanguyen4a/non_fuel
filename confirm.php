<?php
session_start();
?>


<?php 
   include "common.php";

   $username =  $_SESSION["username"];
   $password =  $_SESSION["password"];
   $sex =  $_SESSION["sex"];
   $hobby_str =  $_SESSION["hobby_str"];

   $hobby =  unserialize($hobby_str);
   $data = packData($username,$password,$sex,$hobby);



   if(!is_array ($hobby)) {
   		$hobby = array();
   }

   echo "UserName : ". $username . "</br>";
   echo "Password : ". $password . "</br>";;
   echo "Sex : ". convertIntToSexString($sex) . "</br>";;
   echo "Hobby : ";

   $numHobbies = count($hobby);

   if($numHobbies > 0) {
   		$i = 0;
   		foreach ($hobby as $key => $value) {
   		 	echo convertIntToHobbyString($key);
   			if(++$i <  $numHobbies) {
   				echo " , ";
   			}
   		}
   }else{
   		echo "none";
   }
?>
<form action="success.php" method="post">
<input type="hidden" name="data" value="<?php echo $data;?>">
<input type="submit" value="Register">
</form>