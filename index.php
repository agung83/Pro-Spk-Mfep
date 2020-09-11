<?php

include 'admin/model/Db.php';;

$db = new Db();



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'components/head.php'; ?>

<body style="background-color: white;">

  <!-- ======= Header ======= -->
  <?php include 'components/navbar.php'; ?>
  <!-- End Header -->

  <?php include 'content.php' ?>

  <!-- ======= Footer ======= -->
  <?php include 'components/footer.php' ?>
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <?php include 'components/script.php'; ?>

</body>

</html>