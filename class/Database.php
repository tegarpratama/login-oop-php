<?php

class Database {
   
   private $host = 'localhost';
   private $user = 'root';
   private $pass  = '';
   private $db_name = 'office';

   public $conn;
   public $stmt;

   public function __construct(){
      $dsn = 'mysql:host='. $this->host . ';dbname=' . $this->db_name;
      $option = [
         PDO::ATTR_PERSISTENT => true,
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ];

      try{
         $this->conn = new PDO($dsn, $this->user, $this->pass, $option);
      }catch(PDOException $e){
         die($e->getMessage());
      }
   }

   public function query($query){
      $this->stmt = $this->conn->prepare($query);
   }

   public function bind($param, $value, $type=null){
      if(is_null($type)){
         switch(true){
            case is_int($value) :
               $type = PDO::PARAM_INT;
               break;
            case is_bool($value) :
               $type = PDO::PARAM_BOOL;
               break;
            case is_null($value) :
               $type = PDO::PARAM_NULL;
               break;
            default :
               $type = PDO::PARAM_STR;
         }
      }
      $this->stmt->bindValue($param, $value, $type);
   }

   public function execute(){
      $this->stmt->execute();
   }

   public function rowCount(){
      return $this->stmt->rowCount();
   }

   public function result(){
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_ASSOC);
   }

   public function resultAll(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
   }
}