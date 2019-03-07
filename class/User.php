<?php 
require_once 'Database.php';

class User {

   private $conn;
   private $table = 'account';
   
   public $validation;
   public $name;
   public $phone;
   public $email;
   public $level;
   public $created;

   public function __construct(){
      $this->conn = new Database(); 
      $this->validation = new Validation();
   }

   public function emailExist(){
      $this->email = $this->validation->checkEmail($_POST['email']);
      $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
      $this->conn->query($query);
      $this->conn->bind('email', $this->email);
      $this->conn->execute();
      return $this->conn->rowCount();
   }

   public function passwordMatches(){
      $password = $_POST['password'];
      $password2 = $_POST['password2'];

      if($password === $password2){
         return true;
      }
   }

   public function checkAccount(){
      if($this->emailExist() > 0){
         $data = $this->conn->result();
         $password_verify = password_verify($_POST['password'], $data['password']);
         if($_POST['password'] == $password_verify){
            $this->name = $data['name'];
            $this->email = $data['email'];
            $this->phone = $data['phone'];
            $this->level = $data['level'];
            return true;
         }else{
            return false;
         }
      }else{
         return false;
      }
   }

   public function createAccount(){
      $this->name = $this->validation->checkName($_POST['name']);
      $this->phone = $this->validation->checkNum($_POST['phone']);
      $this->email = $this->validation->checkEmail($_POST['email']);
      $password = $_POST['password'];
      $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $this->level = 'User';
      $this->created = date('Y-m-d H:i:s');

      if(($this->name && $this->phone && $this->email) == 0){
         return 0;
      }else{ 
         $query = "INSERT INTO account (id, name, phone, email, password, level, created) VALUES ('', :name, :phone, :email, :password, :level, :created)";
         $this->conn->query($query);
         $this->conn->bind('name', $this->name);
         $this->conn->bind('phone', $this->phone);
         $this->conn->bind('email', $this->email);
         $this->conn->bind('password', $password_hash);
         $this->conn->bind('level', $this->level);
         $this->conn->bind('created', $this->created);
         $this->conn->execute();
         return $this->conn->rowCount();
      }
   }

   public function getAccount(){
      $query = "SELECT * FROM account";
      $this->conn->query($query);
      return $this->conn->resultALl();
   }
}