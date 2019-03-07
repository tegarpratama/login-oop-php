<?php 

if(!isset($_SESSION['login']) && ($_SESSION['level'] != 'User')){
   header('Location: ../login.php');
   exit;
}

?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?php echo $page_title; ?></title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark" style="background-color: #efefed;">
  <a class="navbar-brand " href="">Your Site</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li <?php echo $page_title == 'Home' ? "class='nav-item active'" : ""; ?>>
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li <?php echo $page_title == 'About' ? "class='nav-item active'" : ""; ?>>
        <a class="nav-link" href="about.php">About <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
       <li class="nav-item">
         <a class="nav-link" href="../logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>