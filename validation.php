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
          if(!preg_match('/^\w{5,}$/', $data['username']) || strlen($data['username']) > 10) 
          {
              $errors['username'] = INVALID_USERNAME;
          }
      }

      private function validatePassword()
      {
          if(!preg_match('/^\w{5,}$/', $data['password']) || strlen($data['password']) > 10) 
          {
              $errors['password']= INVALID_PASSWORD;
          }
      }

      private function validateSex()
      {
          if(!in_array($data['sex'], array(1,2))) 
          {
              $errors['sex']= INVALID_SEX;
          }
      }

      private function validateHobby()
      {
          if(in_array($data['hobby'], array(1,2) ) 
          {
              $errors['hobby']= INVALID_HOBBY;
          }
      }

      private function validateJob()
      {
          if($data['job'] > 4 || $data['job'] < 1 ) 
          {
              $errors['job']= INVALID_JOB;
          }
      }

      private function validateAvatar()
      {
          if($data['upfile']['size'] > 10000) 
          {
              $errors['avatar']= INVALID_FILE;
          }
      }

}

?>