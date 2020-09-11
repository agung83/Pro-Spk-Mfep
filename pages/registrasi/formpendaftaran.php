<section id="contact" class="contact section-bg mt-5">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registrasi</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <form action="" method="POST" enctype="multipart/form-data" class="php-email-form">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        if ($db->registrasiMhs($_POST) > 0) {
                            echo "<div class='alert alert-warning'>Anda Berhasil terdaftar, Selanjutnya Silahkan Login</div>";
                            echo "<meta http-equiv='refresh' content='3;url=index.php'>";
                        } else {
                            echo "
                    <script>
                    alert('Data gagal di simpan');
                    window.location='index.php';
                    </script>
                    ";
                        }
                    }
                    ?>
                    <div class="form-row">
                        <div class="col form-group">
                            <input type="number" required name="nobp" class="form-control" placeholder="Nomor BP">
                        </div>
                        <div class="col form-group">
                            <input type="password" required class="form-control" name="pass" placeholder="Password">

                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" required class="form-control" name="email" placeholder="Email">

                    </div>
                    <div class="form-group ">
                        <label for="">Upload Foto</label>
                        <input type="file" required name="foto" class="form-control-file" style="background: antiquewhite;" placeholder="Foto">
                    </div>

                    <div class="text-center"><button class="btn btn-warning" type="submit">daftar</button></div>
                </form>

            </div>

        </div>

    </div>
</section><!-- End Contact Section -->