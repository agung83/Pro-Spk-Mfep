<nav class="navbar navbar-expand navbar-dark static-top" style="background-color: #6C63FF;">

  <a class="navbar-brand mr-1" href="index.php">SMK NEGERI 1 KINALI</a>

  <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
    <i class="fas fa-bars"></i>
  </button>

  <!-- Navbar Search -->
  <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

  </form>

  <!-- Navbar -->
  <ul class="navbar-nav ml-auto ml-md-0">

    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php
        $fotoadmin = $_SESSION['admin']['admin_foto'];

        ?>
        <img style="width: 30px;" class=" rounded-circle" src="images/admin/<?php echo $fotoadmin ?>" alt="">
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">


        <a class="dropdown-item" href="logout.html">Logout</a>
      </div>
    </li>
  </ul>

</nav>