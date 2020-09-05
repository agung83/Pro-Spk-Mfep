<?php
include 'model/Db.php';
$db = new Db();


if (empty($_SESSION['admin'])) {
  echo "<script>
  window.location='login.html';
  </script>";
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>ADMIN SMK NEGERI 1 KINALI</title>


  <?php include('components/head.php') ?>

</head>

<body id="page-top" style="background-color: whitesmoke;">

  <?php include 'components/top.navbar.php' ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'components/sidebar.php' ?>
    <!----==================================-->

    <div id="content-wrapper">

      <?php include 'content.php' ?>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php include 'components/footer.php' ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!--modal logout-->
  <?php include 'components/modal.php' ?>


</body>

<?php include 'components/script.php' ?>


</html>