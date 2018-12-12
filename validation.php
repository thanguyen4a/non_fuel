<?php

class Validation {

    const INVALID_USERNAME = "UserName không hợp lệ";
    const INVALID_PASSWORD = "PassWord không hợp lệ";
    const INVALID_SEX = "Sex không hợp lệ";
    const INVALID_HOBBY = "Hobby không hợp lệ";
    const INVALID_JOB = "Job không hợp lệ";
    const INVALID_AVATAR = "Avatar không hợp lệ";

    private $errors = array();
    private $data;
      
      function __construct ($data) {
          $this->data = $data;
      }
      

      public function run() 
      {
          $this->errors = array();

          $this->validateUserName();
          $this->validatePassword();
          $this->validateSex();
          $this->validateHobby();
          $this->validateJob();
          $this->validateAvatar();

          return $this->errors;
      }

      private function validateUserName()
      {
          if(strlen($this->data['username']) > 10) 
          {
              $this->errors['username'] = self::INVALID_USERNAME;
          }
      }

      private function validatePassword()
      {
          if(strlen($this->data['password']) > 10) 
          {
              $this->errors['password']= self::INVALID_PASSWORD;
          }
      }

      private function validateSex()
      {
          if(!in_array($this->data['sex'], array(1,2))) 
          {
              $this->errors['sex']= self::INVALID_SEX;
          }
      }

      private function validateHobby()
      {
          if(isset($this->data['hobby'])){

              if(is_array($this->data['hobby']) ) {

                foreach ($this->data['hobby'] as $hobby) {
                      if(!in_array($hobby, array(0,1,2,3,4,5))) {
                          $this->errors['hobby'] = self::INVALID_HOBBY;
                          return;

                    }
                }

                
              } else if($this->data['hobby'] != -1) {
                  $this->errors['hobby']= self::INVALID_HOBBY;
                  return;
              }
          }
      }

      private function validateJob()
      {
          if($this->data['job'] > 4 || $this->data['job'] < 1 ) 
          {
              $this->errors['job']= self::INVALID_JOB;
          }
      }

      private function validateAvatar()
      {
          if(isset($this->data['upfile']) && $this->data['upfile']['size'] > 10000) 
          {
              $this->errors['avatar']= self::INVALID_FILE;
          }
      }

}

?>