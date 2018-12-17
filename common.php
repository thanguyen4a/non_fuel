<?php

class Common {

public function convertIntToHobbyString($int_hobby)
{

	switch ($int_hobby) {
	  case 0 : return "game";
      case 1 : return "soccer";
      case 2 : return "music";
      case 3 : return "swiming";
      case 4 : return "reading";
      case 5 : return "other";
      default : return "none";
	}

}

public function convertIntToSexString($int_sex)
{

	switch ($int_sex) {
	  case 1 : return "Male";
      case 2 : return "Female";
      default : return "Male";
	}

}

public function convertIntToJobString($int_job)
{

	switch ($int_job) {
	  case 1 : return "Engineer";
      case 2 : return "Student";
      case 3 : return "Pupil";
      case 4 : return "Actor";
      default : return "Actor";
	}

}

public function getAvatarPath ($avatar_name) {
	return 'img/'.$avatar_name;
}

public function printAvatar ($full_path)
{

	echo ' <div id="background">  <img  src=" '.$full_path.' " /></div>';
	echo ' 
	    <!-- page content -->
	  </body>
	</html>';
}


public function packData($username,$password,$sex,$hobby,$job,$file)
{
	$data = array();
	$data["username"] = $username;
	$data["sex"] = $sex;
	$data["password"] = $password;
	$data["hobby"] = $hobby;
	$data["job"] = $job;
	$data["file"] = $file;
	
	$data = serialize($data);
	$data = base64_encode($data);
	return $data;
}


public function getPrintHobbyStr($hobby_str)
{
   $result = "";
   $hobby =  unserialize($hobby_str);
   if(!is_array ($hobby)) {
   		$hobby = array();
   }

   $numHobbies = count($hobby);

   if($numHobbies > 0) {
   		$i = 0;
   		foreach ($hobby as $key => $value) {
   		 	$result.=$this->convertIntToHobbyString($value);
   			if(++$i <  $numHobbies) {
   				$result.=" , ";
   			}
   		}
   }else{
   		$result = "none";
   }

   return $result;
}



public function checkExitHobby($hobby,$str_hobby) 
{	

  if(!is_array($hobby)) {
      return ($hobby == $str_hobby);
  }

	foreach ($hobby as $key => $value) {
   		 	
			if($value == $str_hobby) {
				  return true;
			}
  }

  return false;
}


public function saveTmpFile($file)
{

	if(is_uploaded_file($file['tmp_name'])){
        //一字ファイルを保存ファイルにコピーできたか
        if(move_uploaded_file($file['tmp_name'],"img/".$file['name'])){

            //正常
            // echo "uploaded";

        }else{

            //コピーに失敗（だいたい、ディレクトリがないか、パーミッションエラー）
            // echo "error while saving.";
        }

    }else{
        //そもそもファイルが来ていない。
        // echo "file not uploaded.";

    }
}


}

?>