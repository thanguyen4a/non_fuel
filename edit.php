<?php 
include "common.php";
include "connection.php";
$connection = new Connection();
$common = new Common();

if (isset($_GET) && isset($_GET["id"])){
	$id = $_GET["id"];
	$data = $connection->selectionByID($id);

	$username = $data["username"];
	$password = $data["password"];
	$sex = $data["sex"];
	$hobby_str = $data["hobby"];
	$job = $data["job"];
	$avatar = $data["avatar"];

	$hobby = unserialize($hobby_str);

	if(!is_array ($hobby)) {
   		$hobby = array();
   }
   
}

if (isset($_POST) && isset($_POST["id"])){
	$id = $_POST["id"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$sex = $_POST["sex"];

	if(isset($_POST["hobby"])) {
		$hobby = $_POST["hobby"];
	} else {
		$hobby = -1;
	}

	$hobby_str = serialize($hobby);
	$job = $_POST["job"];

	$common->saveFile($_FILES['up_file']);
	$avatar = $_FILES['up_file']['name'];
	$result = $connection->update($id,$username,$password,$sex,$hobby_str,$job,$avatar);
	header("Location: http://localhost/non_fuel/list.php"); 
}
?>





<form action="edit.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id;?>">
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
<td><input type="submit" value="Edit">
<input type="reset" value="Reset"></td>
</tr>

</table>

</form>