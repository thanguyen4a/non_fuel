<?php
class Connection {

private $servername = "localhost";
private $user_name = "thanguyen";
private $pass_word = "thanguyen";
private $dbname = "fuel";


public function insert($username,$password,$sex,$hobby_str)
{
	// Create connection
	$conn = new mysqli($this->servername, $this->user_name, $this->pass_word, $this->dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "INSERT INTO user (id,username,password,sex,hobby)
	VALUES (null,'$username','$password','$sex','$hobby_str')";

	return $conn->query($sql) ;

	$conn->close();
}


// function selection($username,$password,$sex,$hobby_str)
// {
// 	// Create connection
// 	$conn = new mysqli($servername, $user_name, $password, $dbname);
// 	// Check connection
// 	if ($conn->connect_error) {
// 	    die("Connection failed: " . $conn->connect_error);
// 	} 

// 	$sql = "INSERT INTO user (id,username,password,sex,hobby)
// 	VALUES (null,'$username','$password','$sex','$hobby_str')";

// 	return $conn->query($sql) ;

// 	$conn->close();
// }

}