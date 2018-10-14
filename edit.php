<?php 
include "common.php";
include "connection.php";
$connection = new Connection();

if (isset($_GET) && isset($_GET["id"])){
	$id = $_GET["id"];
	$data = $connection->selectionByID($id);

	$username = $data["username"];
	$password = $data["password"];
	$sex = $data["sex"];
	$hobby_str = $data["hobby"];
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
	$hobby = $_POST["hobby"];
	$hobby_str = serialize($hobby);
	$result = $connection->update($id,$username,$password,$sex,$hobby_str);
	header("Location: http://localhost/non_fuel/list.php"); 
}
?>





<form action="edit.php" method="post">
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
      <input type="checkbox" name="hobby[]" value="0" <?php if (isset($hobby[0])) echo 'checked'; ?>>Game
      <input type="checkbox" name="hobby[]" value="1" <?php if (isset($hobby[1])) echo 'checked'; ?>>Soccer
      <input type="checkbox" name="hobby[]" value="2" <?php if (isset($hobby[2])) echo 'checked'; ?>>Music
      <input type="checkbox" name="hobby[]" value="3" <?php if (isset($hobby[3])) echo 'checked'; ?>>Swiming
      <input type="checkbox" name="hobby[]" value="4" <?php if (isset($hobby[4])) echo 'checked'; ?>>Reading
      <input type="checkbox" name="hobby[]" value="5" <?php if (isset($hobby[5])) echo 'checked'; ?>>Other
    </td>
</tr>

<tr>
<td><input type="submit" value="Edit">
<input type="reset" value="Reset"></td>
</tr>

</table>

</form>