<?php
$idregis = $_SESSION['mahasiswa']['register_id'];
$data = $db->ambildataRegister($idregis)[0];
?>
<section id="contact" class="contact section-bg mt-5">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Biodata</li>
                </ol>
            </nav>
        </div>

        <div class="card-header bg-white
        ">
            <h2 class="text-justify text-capitalize font-weight-light">Formulir Biodata</h2>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <form action="" method="POST" enctype="multipart/form-data" class="php-email-form">
                    <?php
                    if (isset($_POST['simpan'])) {
                        // if (isset($_POST['save'])) {
                        $db->SimpanMhs($_POST);
                        // var_dump($_POST);
                        // exit;
                        echo "<div class='alert alert-danger text-center'>Biodata anda telah tersimpan, silahkan lihat profil anda</div>";
                        echo "<meta http-equiv='refresh' content='7;url=?page=home'>";
                    }
                    ?>
                    <div class="card-md ">

                        <div class="col form-group">
                            <h3 class="text-center mb-3 text-capitalize r">DATA TOEFL</h3>
                            <select name="toefl" class="form-control" id="">
                                <option value="">--Pilih Toefl--</option>
                                <?php $datatoefl = $db->SelectToefl();
                                foreach ($datatoefl as $pecah) :
                                ?>
                                    <option value="<?= $pecah['toefl_id'] ?>"><?= $pecah['toefl_nama'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <h3 class="text-center mb-3 "> BIODATA</h3>
                    <div class="form-group">
                        <img class="rounded-circle mx-auto d-block" width="200" src="assets/img/fotomhs/<?= $data['register_foto'] ?>" alt="kosong">
                    </div>
                    <div class="form-row ">
                        <div class="col form-group">
                            <input type="text" required class="form-control" name="nama" placeholder="Nama Lengkap">

                        </div>
                        <div class="col form-group">
                            <input type="hidden" name="id_regis" value="<?= $data['register_id'] ?>">
                            <input type="number" readonly required name="nobp" value="<?= $data['register_nobp'] ?>" class="form-control" placeholder="Nomor BP">
                        </div>

                    </div>

                    <div class="form-group">
                        <input type="email" readonly value="<?= $data['register_email'] ?>" required class="form-control" name="email" placeholder="Email">

                    </div>

                    <div class="form-row">
                        <div class="col form-group">
                            <select name="jk" id="" required class="form-control">
                                <option value="">Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>

                            </select>
                        </div>

                        <div class="col form-group">
                            <input type="text" name="agama" required placeholder="Agama" class="form-control">
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col form-group">
                            <input type="text" required name="tempat" class="form-control" placeholder="Tempat Lahir">
                        </div>
                        <div class="col form-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Tgl Lahir</div>
                                <input type="date" required class="form-control" name="tgllahir" placeholder="Tgl Lahir">
                            </div>
                        </div>
                    </div>

                    <div class="dropdown-divider"></div>

                    <div class="form-row">
                        <div class="col form-group">
                            <input type="text" placeholder="Jurusan" required name="jurusan" class="form-control">
                        </div>

                        <div class="col form-group">
                            <input type="text" name="wisudake" required class="form-control" placeholder="Wisuda Ke" id="">
                        </div>
                    </div>

                    <div class="col form-group">
                        <input type="number" required placeholder="Nomor Telepon" name="tlpon" class="form-control">
                    </div>

                    <div class="form-group">
                        <textarea name="alamat" required class="form-control" id="" cols="30" rows="5" placeholder="Alamat"></textarea>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-warning" type="submit" name="simpan">daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!-- End Contact Section -->