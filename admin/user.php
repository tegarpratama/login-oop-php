<?php 
require_once '../init.php';

if(!isset($_SESSION['login']) && ($_SESSION['level'] != 'Admin')){
   header('Location: ../login.php');
   exit;
}

$user = new User();
$page_title = 'User Account';
require_once 'header.php';
?>

<div class="container">
   <table class="table table-bordered mt-5">
      <thead>
         <th>No</th>
         <th>Name</th>
         <th>Phone</th>
         <th>Email</th>
         <th>Level</th>
      </thead>
      <tbody>
      <?php $no = 1; ?>
      <?php $data =  $user->getAccount(); ?>
      <?php foreach($data as $d) : ?>
         <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['name']; ?></td>
            <td><?php echo $d['phone']; ?></td>
            <td><?php echo $d['email']; ?></td>
            <td><?php echo $d['level']; ?></td>
         </tr>
      <?php endforeach; ?>
      </tbody>
   </table>
</div>

<?php require_once 'footer.php'; ?>

