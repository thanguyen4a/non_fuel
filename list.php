<?php
include "common.php";
include "connection.php";
$connection = new Connection();

$user_list = $connection->selection();




echo '<table border="1">';
echo "<tr>";
	echo "<td>ID</td>";
	echo "<td>Username</td>";
	echo "<td>Password</td>";
	echo "<td>Sex</td>";
	echo "<td>Hobby</td>";
	echo "<td>Edit</td>";
echo "</tr>";


foreach ($user_list  as $user) {
	$id = $user['id']; 
	$username = $user['username'];
	$password = $user['password'];
	$sex_name = convertIntToSexString($user["sex"]);
	$hobby_str = getPrintHobbyStr($user["hobby"]);	

	$link_edit = "<a href='edit.php?id=$id'>Edit</a>";
	echo "<tr>";
		echo "<td>$id</td>";
		echo "<td>$username</td>";
		echo "<td>$password</td>";
		echo "<td>$sex_name</td>";
		echo "<td>$hobby_str</td>";
		echo "<td>$link_edit</td>";

	echo "</tr>";
	
}

echo "</table>";


