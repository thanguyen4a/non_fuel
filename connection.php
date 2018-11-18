<?php
class Connection {

private $servername = "localhost";
private $user_name = "thanguyen";
private $pass_word = "thanguyen";
private $dbname = "fuel";


public function insert($username,$password,$sex,$hobby_str,$job,$avatar)
{
	// Create connection
	$conn = new mysqli($this->servername, $this->user_name, $this->pass_word, $this->dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "INSERT INTO user (id,username,password,sex,hobby,job,avatar)
	VALUES (null,'$username','$password','$sex','$hobby_str','$job','$avatar')";

	$data = $conn->query($sql) ;
	$conn->close();
	return $data;
	
}


public function selection()
{
	// Create connection
	$conn = new mysqli($this->servername, $this->user_name, $this->pass_word, $this->dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM user";

	$result = $conn->query($sql) ;
	$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
	$conn->close();
	return $data;
	

}

public function countUsers()
{
	$data = $this->selection();
	return count($data);

}



public function selectionByID($id)
{
	// Create connection
	$conn = new mysqli($this->servername, $this->user_name, $this->pass_word, $this->dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM user where id = $id";

	$result = $conn->query($sql) ;
	$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
	$conn->close();
	return $data[0];
	
}

public function selectionByPage($offset,$limit)
{

	// Create connection
	$conn = new mysqli($this->servername, $this->user_name, $this->pass_word, $this->dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM user  order by ID LIMIT $offset , $limit ";

	$result = $conn->query($sql) ;
	$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
	$conn->close();
	return $data;
}


public function update($id,$username,$password,$sex,$hobby_str,$job,$avatar)
{
	// Create connection
	$conn = new mysqli($this->servername, $this->user_name, $this->pass_word, $this->dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	if($avatar != "") {

		$sql = "UPDATE user SET 
			username = '$username',
			password = '$password',
			sex = '$sex',  
			hobby = '$hobby_str', 
			job = '$job',  
			avatar = '$avatar'  
			WHERE id = $id";
	} else {
		$sql = "UPDATE user SET 
			username = '$username',
			password = '$password',
			sex = '$sex',  
			hobby = '$hobby_str', 
			job = '$job'
			WHERE id = $id";
	}


	$result = $conn->query($sql) ;
	$conn->close();
	return $result;
	
}


}

