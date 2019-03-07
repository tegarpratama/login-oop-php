<?php 
require_once '../init.php';

if(!isset($_SESSION['login']) && ($_SESSION['level'] != 'User')){
   header('Location: ../login.php');
   exit;
}

$page_title = 'About';
require_once 'header.php';
?>

<div class="container">
   <div class="card text-center mt-5">
      <div class="card-header">
         Welcome Back
      </div>
      <div class="card-body">
         <h5 class="card-title"><?php echo $_SESSION['name']; ?></h5>
         <p class="card-text">Your email <?php echo $_SESSION['email'] ?></p>
      </div>
      <div class="card-footer text-muted">
         Your Phone <?php echo $_SESSION['phone']; ?>
      </div>
   </div>
</div>

<?php require_once 'footer.php'; ?>