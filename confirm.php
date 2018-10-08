<?php
session_start();
?>

UserName：<?php if (isset($_SESSION) && isset($_SESSION["username"])) {
echo $_SESSION["username"];?>


<?php
if(isset($_POST) && isset($_POST["username"])){


$servername = "localhost";
$username = "thanguyen";
$password = "thanguyen";
$dbname = "fuel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


}

?>






<form action="confirm.php" method="post">
UserName：<input type="hidden" name="username" value="<?php if (isset($_SESSION) && isset($_SESSION["username"])) {
	echo $_SESSION["username"];
}?>" >
<input type="submit" value="Register">
<input type="reset" value="Reset">
</p>
</form>