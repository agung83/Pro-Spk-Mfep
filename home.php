<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class=" breadcrumb-item active">
      Home
    </li>
  </ol>

  <!-- Icon Cards-->
  <div class="row">

    <div class="col-xl-4 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa fa-clock"></i>
          </div>
          <div class="mr-5">
            <h3 id="jamDigital"></h3>
          </div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">Jam Digital</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>

    <div class="col-xl-4 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-user"></i>
          </div>
          <?php
          $ambil = $koneksi->query("SELECT COUNT(*) FROM tbl_admin");
          $pecah = $ambil->fetch_assoc();
          // var_dump($pecah['COUNT(*)']);
          // // $admin = $pecah->num_row();
          // $admin = mysqli_num_rows($ambil);
          ?>
          <div class="mr-5"><?php echo $pecah['COUNT(*)'] ?> Admin</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="admin.html">
          <span class="float-left">Lihat Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>



  </div>

</div>

<script>
  window.setTimeout("waktu()", 1000);

  function waktu() {
    var waktu = new Date();
    setTimeout("waktu()", 1000);
    var jam = waktu.getHours();
    var menit = waktu.getMinutes();
    var detik = waktu.getSeconds();

    var hasil = " " + jam + ":" + menit + ":" + detik + ""


    document.getElementById('jamDigital').innerHTML = hasil


  }
</script>