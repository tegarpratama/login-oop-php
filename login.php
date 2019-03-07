<?php 
$page_title = 'Login';
require_once 'init.php';

if(isset($_SESSION['login']) && $_SESSION['level'] == 'Admin'){
   header('Location: admin/index.php');
}else if(isset($_SESSION['login']) && $_SESSION['level'] == 'User'){
   header('Location: user/index.php');
}else{
   
}

$user = new User();

if(isset($_POST['login'])){
   if(($user->checkAccount() == true) && ($user->level == 'Admin')){
      $_SESSION['login'] = true;
      $_SESSION['name'] = $user->name;
      $_SESSION['phone'] = $user->phone;
      $_SESSION['email'] = $user->email;
      $_SESSION['level'] = $user->level;
      header('Location: admin/index.php');
   }else if(($user->checkAccount() == true) && ($user->level == 'User')){
      $_SESSION['login'] = true;
      $_SESSION['name'] = $user->name;
      $_SESSION['phone'] = $user->phone;
      $_SESSION['email'] = $user->email;
      $_SESSION['level'] = $user->level;
      header('Location: user/index.php');
   }else{
      Flasher::setFlash('Wrong email or password!',' <br/>please try again.','danger');
   }
}

require_once 'header.php';
?>

<div class="container mt-5">
   <h2 class="text-center text-info mb-3">LOGIN</h2>
   <div class="row justify-content-center">
         <div class="col-md-4 form-group text-center">
            <?php Flasher::flash(); ?>
         </div>
   </div>
   <form action="" method="post">
      <div class="row justify-content-center">
         <div class="col-md-4 form-group">
            <input type="text" class="form-control border border-info" placeholder="Email" name="email" required>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col-md-4 form-group">
            <input type="password" class="form-control border border-info" placeholder="Password" name="password" required>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col-md-4">
            <input type="submit" class="btn btn-info btn-block" placeholder="login" name="login">
         </div>
      </div>
   </form>
   <div class="row justify-content-center text-center mt-2">
         <div class="col-md-4">
            <p>You dont have account ? <a class="text-info" href="register.php">Register here.</a></p>
         </div>
   </div>
</div>

<?php require_once 'footer.php'; ?>