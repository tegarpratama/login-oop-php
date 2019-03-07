<?php 
require_once '../init.php';

if(!isset($_SESSION['login']) && ($_SESSION['level'] != 'User')){
   header('Location: ../login.php');
   exit;
}

$page_title = 'Home';
require_once 'header.php';
?>

<div class="container">
   <div class="jumbotron mt-5">
      <h1 class="display-4">Hello, <?php echo $_SESSION['name']; ?></h1>
      <hr class="my-4">
      <p class="lead">This is a login and registation with PHP Object Oriented.</p>
   </div>
</div>

<?php require_once 'footer.php'; ?>