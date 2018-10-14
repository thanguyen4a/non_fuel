<?php


function convertIntToHobbyString($int_hobby)
{

	switch ($int_hobby) {
	  case 1 : return "game";
      case 2 : return "soccer";
      case 3 : return "music";
      case 4 : return "swiming";
      case 5 : return "reading";
      case 6 : return "other";
      default : return "other";
	}

}

function convertIntToSexString($int_sex)
{

	switch ($int_sex) {
	  case 1 : return "Male";
      case 2 : return "Female";
      default : return "Male";
	}

}


function packData($username,$password,$sex,$hobby)
{
	$data = array();
	$data["username"] = $username;
	$data["sex"] = $sex;
	$data["password"] = $password;
	$data["hobby"] = $hobby;
	
	$data = serialize($data);
	$data = base64_encode($data);
	return $data;
}




?>