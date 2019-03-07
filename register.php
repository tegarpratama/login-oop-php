<?php 
$page_title = 'Registation';
require_once 'init.php';
$user = new User();

if(isset($_POST['register'])){
   if($user->emailExist() > 0){
      Flasher::setFlash('Email already exist!',' try again','danger');
   }else if($user->passwordMatches() != true){
      Flasher::setFlash('Password not matches!',' try again','danger');
   }else{
      if($user->createAccount() > 0){
         Flasher::setFlash('Successfully Registered',' please login.','success');
         header('Location: login.php');
         exit;
      }else{
         Flasher::setFlash('Failed Registered',' try again','danger');
      }
   }
}

require_once 'header.php';
?>

<div class="container mt-4">
   <h2 class="text-center text-info">REGISTRATION</h2>
   <div class="row justify-content-center">
         <div class="col-md-5 form-group text-center">
            <?php Flasher::flash(); ?>
         </div>
   </div>
   <form action="" method="post">
      <div class="row justify-content-center">
         <div class="form-group col-md-5">
            <label for="exampleInputName">Your Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputName" placeholder="Enter Name" required>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="form-group col-md-5">
            <label for="exampleInputPhone">Phone Number</label>
            <input type="number" class="form-control" name="phone" id="exampleInputPhone" placeholder="Phone Number" required>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="form-group col-md-5">
            <label for="exampleInputEmail">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail" placeholder="name@example.com" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="form-group col-md-5">
            <label for="exampleInputPass">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPass" placeholder="Password" required>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="form-group col-md-5">
            <label for="exampleInputPass2">Confirm Password</label>
            <input type="password" class="form-control" name="password2" id="exampleInputPass2" placeholder="Confirm Password" required>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col-md-5">
            <input type="submit" class="btn btn-info btn-block" placeholder="Register" name="register">
         </div>
      </div>
   </form>
   <div class="row justify-content-center text-center mt-2">
         <div class="col-md-5">
            <p>You already have an account ? <a class="text-info" href="login.php">Login Here.</a></p>
         </div>
   </div>
</div>

<?php require_once 'footer.php'; ?>