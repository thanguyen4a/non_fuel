<?php
session_start();
include "common.php";
$common = new Common();
?>


<?php 

if (isset($_POST) && isset($_POST["username"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$sex = $_POST["sex"];

	if(isset($_POST["hobby"])) {
		$hobby = $_POST["hobby"];
	} else {
		$hobby = -1;
	}
	
	$hobby_str = serialize($hobby);
	$common->saveFile($_FILES['up_file']);


// $_SESSION['username'] = $_POST["username"];
// $_SESSION['password'] = $_POST["password"];
// $_SESSION['sex'] = $_POST["sex"];
// $_SESSION['hobby_str'] = $hobby_str;
$job = $_POST["job"];
$avatar = $_FILES['up_file']['name'];


$params = "?username=$username&password=$password&sex=$sex&job=$job&avatar=$avatar&hobby_str=$hobby_str";

header("Location: http://localhost/non_fuel/confirm.php".$params); 
}

?>


<form action="register.php" method="post" enctype="multipart/form-data">

<table border="0">
<tr>
<td>UserName：<input type="text" name="username" value="" ></td>
</tr>
<tr>
<td>Password：<input type="password" name="password" value="" ></td>
</tr>
<tr>
	<td>Sex
		<input type="radio" name="sex" value="１" checked>Male
		<input type="radio" name="sex" value="２">Female
	</td>
<tr>

<tr>
	<td>hobby
      <input type="checkbox" name="hobby[]" value="0">Game
      <input type="checkbox" name="hobby[]" value="1">Soccer
      <input type="checkbox" name="hobby[]" value="2">Music
      <input type="checkbox" name="hobby[]" value="3">Swiming
      <input type="checkbox" name="hobby[]" value="4">Reading
      <input type="checkbox" name="hobby[]" value="5">Other
    </td>
</tr>

<tr>
	<td>Job
     	<select name="job">
		<option value="1">Engineer</option>
		<option value="2">Student</option>
		<option value="3">Pupil</option>
		<option value="4">Actor</option>
		</select>
    </td>
</tr>
<tr>
	<td>Avatar  <input type="file" name="up_file" id="fileToUpload" >
    </td>
</tr>





<tr>
<td><input type="submit" value="Register">
<input type="reset" value="Reset"></td>
</tr>

</table>

</form>

