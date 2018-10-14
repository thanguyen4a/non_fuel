<?php
session_start();
?>


<?php 

if (isset($_POST) && isset($_POST["username"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$sex = $_POST["sex"];
	$hobby = $_POST["hobby"];
	$hobby_str = serialize($hobby);

$_SESSION['username'] = $_POST["username"];
$_SESSION['password'] = $_POST["password"];
$_SESSION['sex'] = $_POST["sex"];
$_SESSION['hobby_str'] = $hobby_str;
header("Location: http://localhost/non_fuel/confirm.php"); 
}

?>


<form action="register.php" method="post">

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
<td><input type="submit" value="Register">
<input type="reset" value="Reset"></td>
</tr>

</table>

</form>

?>