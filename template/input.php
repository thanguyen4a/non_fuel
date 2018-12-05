<form action="register.php" method="post" enctype="multipart/form-data">

<table border="0">
<tr>
<td>UserName：<input type="text" name="username" value="<?php echo $username; ?>" ></td>
</tr>
<tr>
<td>Password：<input type="password" name="password" value="<?php echo $password; ?>" ></td>
</tr>
<tr>
	<td>Sex
		<?php if ($sex == 1) {
			echo '<input type="radio" name="sex" value="1" checked>Male
				<input type="radio" name="sex" value="2">Female';
		} else {
			echo '<input type="radio" name="sex" value="1" >Male
				<input type="radio" name="sex" value="2" checked>Female';
		}
		?>
	</td>
<tr>
<tr>
	<td>hobby
      <input type="checkbox" name="hobby[]" value="0" <?php if ($common->checkExitHobby($hobby,"0")) echo 'checked'; ?>>Game
      <input type="checkbox" name="hobby[]" value="1" <?php if ($common->checkExitHobby($hobby,"1")) echo 'checked'; ?>>Soccer
      <input type="checkbox" name="hobby[]" value="2" <?php if ($common->checkExitHobby($hobby,"2")) echo 'checked'; ?>>Music
      <input type="checkbox" name="hobby[]" value="3" <?php if ($common->checkExitHobby($hobby,"3")) echo 'checked'; ?>>Swiming
      <input type="checkbox" name="hobby[]" value="4" <?php if ($common->checkExitHobby($hobby,"4")) echo 'checked'; ?>>Reading
      <input type="checkbox" name="hobby[]" value="5" <?php if ($common->checkExitHobby($hobby,"5")) echo 'checked'; ?>>Other
    </td>
</tr>

<tr>
	<td>Job
     	<select name="job">
		<option value="1" <?php if ($job == 1) echo 'selected';?>>Engineer</option>
		<option value="2" <?php if ($job == 2) echo 'selected';?>>Student</option>
		<option value="3" <?php if ($job == 3) echo 'selected';?>>Pupil</option>
		<option value="4" <?php if ($job == 4) echo 'selected';?>>Actor</option>
		</select>
    </td>
</tr>
<tr>
	<td>Avatar  <input type="file" name="up_file" id="fileToUpload" >
	<?php
		$full_path = $common->getAvatarPath($avatar);
		echo "</br>";
		echo $avatar;
		echo "</br>";
 		$common->printAvatar($full_path);
	?>

    </td>
</tr>

<tr>
<td><input type="submit" name="input" value="登録">
<input type="reset" value="リセット"></td>
</tr>

</table>

</form>
