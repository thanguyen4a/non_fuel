 <?php
   echo "UserName : ". $username . "</br>";
   echo "Password : ". $password . "</br>";;
   echo "Sex : ". $common->convertIntToSexString($sex) . "</br>";
   echo "Hobby : ". $common->getPrintHobbyStr($hobby_str). "</br>";
   echo "Job : ".$common->convertIntToJobString($job). "</br>";
   $full_path = $common->getAvatarPath($avatar);
   echo "Avatar : "; $common->printAvatar($full_path). "</br>";
?>
<form action="register.php" method="post">
<input type="hidden" name="data" value="<?php echo $data;?>">
<input type="submit" name="confirm" value="登録">
<input type="submit" name="back" value="戻る">
</form>