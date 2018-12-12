<form action="register.php" method="post" enctype="multipart/form-data">

<table border="0">
<tr>
<td>UserName：<input type="text" name="username" value="<?php if(isset($username))  echo $username; ?>" ></td>

<?php
	if(isset($errors["username"])){
		$error_username = $errors["username"];
		echo "<td>$error_username</td>";
	}
?>

</tr>




<tr>
<td>Password：<input type="password" name="password" value="<?php if(isset($password)) echo $password; ?>" ></td>
	<?php
		if(isset($errors["password"])){
			$error_password = $errors["password"];
			echo "<td>$error_password</td>";
		}
	?>
</tr>



<tr>
<td>Sex
	<?php if (isset($sex) && $sex == 1) {
		echo '<input type="radio" name="sex" value="1" checked>Male
			<input type="radio" name="sex" value="2">Female';
	} else {
		echo '<input type="radio" name="sex" value="1" >Male
			<input type="radio" name="sex" value="2" checked>Female';
	}
	?>
</td>
	<?php
		if(isset($errors["sex"])){
			$error_sex = $errors["sex"];
			echo "<td>$error_sex</td>";
		}
	?>

</tr>





<tr>
	<td>hobby
      <input type="checkbox" name="hobby[]" value="0" <?php if (isset($hobby) && $common->checkExitHobby($hobby,"0")) echo 'checked'; ?>>Game
      <input type="checkbox" name="hobby[]" value="1" <?php if (isset($hobby) && $common->checkExitHobby($hobby,"1")) echo 'checked'; ?>>Soccer
      <input type="checkbox" name="hobby[]" value="2" <?php if (isset($hobby) && $common->checkExitHobby($hobby,"2")) echo 'checked'; ?>>Music
      <input type="checkbox" name="hobby[]" value="3" <?php if (isset($hobby) && $common->checkExitHobby($hobby,"3")) echo 'checked'; ?>>Swiming
      <input type="checkbox" name="hobby[]" value="4" <?php if (isset($hobby) && $common->checkExitHobby($hobby,"4")) echo 'checked'; ?>>Reading
      <input type="checkbox" name="hobby[]" value="5" <?php if (isset($hobby) && $common->checkExitHobby($hobby,"5")) echo 'checked'; ?>>Other
    <?php
		if(isset($errors["hobby"])){
			$error_hobby = $errors["hobby"];
			echo "<td>$error_hobby</td>";
		}
	?>
    </td>
</tr>




<tr>
	<td>Job
     	<select name="job">
		<option value="1" <?php if (isset($job) && $job == 1) echo 'selected';?>>Engineer</option>
		<option value="2" <?php if (isset($job) && $job == 2) echo 'selected';?>>Student</option>
		<option value="3" <?php if (isset($job) && $job == 3) echo 'selected';?>>Pupil</option>
		<option value="4" <?php if (isset($job) && $job == 4) echo 'selected';?>>Actor</option>
		</select>
	<?php
		if(isset($errors["job"])){
			$error_job = $errors["job"];
			echo "<td>$error_job</td>";
		}
	?>
    </td>
</tr>



<tr>
	<td>Avatar  <input type="file" name="up_file" id="fileToUpload">
	<?php

		if(isset($avatar) && $avatar != "" ) {

			$full_path = $common->getAvatarPath($avatar);
			echo "<td>";
			echo $avatar;
			echo "<td>";
	 		$common->printAvatar($full_path);
 		} 
	?>
		<?php
		if(isset($errors["avatar"])){
			$error_avatar = $errors["avatar"];
			echo "<td>$error_avatar";
		}
		?>
    </td>
</tr>



<tr>
<td><input type="submit" name="input" value="登録">
<input type="reset" value="リセット"></td>
</tr>

</table>

</form>
