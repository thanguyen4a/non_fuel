<?php
session_start();
?>

<form action="register.php" method="post">
UserName：<input type="text" name="username" value="<?php if (isset($_POST) && isset($_POST["username"])) {
	echo $_POST["username"];
}?>" >
<input type="submit" value="Register">
<input type="reset" value="Reset">
</p>
</form>



<?php
if (isset($_POST) && isset($_POST["username"])) {
	$username = $_POST["username"];

if(is_numeric($username)) {
    $error = "lỗi username không được phép là số";
    echo  $error;
} else {
	$_SESSION['username'] = $_POST["username"];
	header("Location: http://localhost/non_fuel/confirm.php"); 
}
}

?>