<?php
include "common.php";
include "connection.php";
include "paging.php";
$connection = new Connection();
$common = new Common();


$count = $connection->countUsers();

if(isset($_GET["page"])) {
	$page = $_GET["page"];
} else {
	$page = 1;
}


$paging= new Paging($count,$page);


if($paging->page > 1) {
	$prev_page = $paging->page - 1;
	echo "<a href='list.php?page=$prev_page'> PrevPage  </a>";
}

if($paging->page < $paging->max_page) {
	$next_page = $paging->page + 1;
	echo "<a href='list.php?page=$next_page'> NextPage  </a>";
}


$user_list = $connection->selectionByPage($paging->start,$paging->hit_per_page);


echo '<table border="1">';
echo "<tr>";
	echo "<td>ID</td>";
	echo "<td>Username</td>";
	echo "<td>Password</td>";
	echo "<td>Sex</td>";
	echo "<td>Hobby</td>";
	echo "<td>Job</td>";
	echo "<td>Avatar</td>";
	echo "<td>Edit</td>";
echo "</tr>";


foreach ($user_list  as $user) {
	$id = $user['id']; 
	$username = $user['username'];
	$password = $user['password'];
	$sex_name = $common->convertIntToSexString($user["sex"]);

	// var_dump(unserialize($user["hobby"]));
	$hobby_str = $common->getPrintHobbyStr($user["hobby"]);	
	$job = $common->convertIntToJobString($user["job"]);
	$avatar = $common->getAvatarPath($user["avatar"]);

	$link_edit = "<a href='edit.php?id=$id'>Edit</a>";
	echo "<tr>";
		echo "<td>$id</td>";
		echo "<td>$username</td>";
		echo "<td>$password</td>";
		echo "<td>$sex_name</td>";
		echo "<td>$hobby_str</td>";
		echo "<td>$job</td>";
		echo "<td>"; $common->printAvatar($avatar);echo "</td>";
		echo "<td>$link_edit</td>";

	echo "</tr>";
	
}

echo "</table>";

