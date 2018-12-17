 <?php
   echo "UserName : ". $username . "</br>";
   echo "Password : ". $password . "</br>";;
   echo "Sex : ". $common->convertIntToSexString($sex) . "</br>";
   echo "Hobby : ". $common->getPrintHobbyStr($hobby_str). "</br>";
   echo "Job : ".$common->convertIntToJobString($job). "</br>";
   
   if($file['tmp_name'] != "") {
   	  echo "Avatar : ";
   	  echo $common->printAvatar($file['tmp_name']). "</br>";
   } else {
   	  echo "Avatar : File not Uploaded</br>";
   }
  
?>
<form action="register.php" method="post">
<input type="hidden" name="data" value="<?php echo $data;?>">
<input type="submit" name="confirm" value="登録">
<input type="submit" name="back" value="戻る">
</form>