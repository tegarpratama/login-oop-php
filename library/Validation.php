<?php

class Validation {

   public function testInput($data){
      $result = trim($data);
      $result = htmlspecialchars($result);
      $result = stripslashes($result);
      return $result;
   }

   public function checkName($name){
      $name = $this->testInput($name);
      if(preg_match("/^[a-zA-Z ]*$/", $name)){
         return $name;
      }else{
         return 0;
      }
   }

   public function checkNum($data){
      if(is_numeric($data)){
         return $data;  
      }else{
         return 0;
      }
   }

   public function checkEmail($data){
      if(filter_var($data, FILTER_VALIDATE_EMAIL)){
         return $data;
      }else{
         return 0;
      }
   }
}