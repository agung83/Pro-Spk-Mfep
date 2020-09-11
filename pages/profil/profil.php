<?php
$idregister = $_SESSION['mahasiswa']['register_id'];
$datamhs = $db->profilMahasiswa($idregister)[0];
?>
<section id="contact" class="contact section-bg mt-5">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profil</li>
                </ol>
            </nav>
        </div>

        <div class="card-header bg-white
        ">
            <h2 class="text-justify text-capitalize font-weight-light">PROFIL MAHASISWA</h2>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <form action="" method="POST" enctype="multipart/form-data" class="php-email-form">

                    <img width="250" class="rounded-circle mx-auto d-block mb-3" src="assets/img/fotomhs/<?= $datamhs['register_foto'] ?>" alt="kosong">

                    <div class="form-row ">
                        <div class="col form-group">
                            <label for="">Nama</label>
                            <input type="text" readonly class="form-control" value="<?= $datamhs['mhs_nama'] ?>">

                        </div>
                        <div class="col form-group">
                            <label for="">Nobp</label>
                            <input type="number" readonly value="<?= $datamhs['register_nobp'] ?>" class="form-control">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" readonly value="<?= $datamhs['register_email'] ?>" required class="form-control">

                    </div>

                    <div class="form-row">
                        <div class="col form-group">
                            <label for="">Jenis Kelamin</label>
                            <input type="text" readonly class="form-control" value="<?= $datamhs['mhs_jk'] ?>">
                        </div>

                        <div class="col form-group">
                            <label for="">Agama</label>
                            <input type="text" readonly value="<?= $datamhs['mhs_agama'] ?>" required class="form-control">
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col form-group">
                            <label for="">Kota Lahir</label>
                            <input type="text" required readonly value="<?= $datamhs['mhs_tempat'] ?>" class="form-control">
                        </div>
                        <div class="col form-group">

                            <label for="">Tgl Lahir</label>
                            <input type="date" readonly required class="form-control" value="<?= $datamhs['mhs_tgllahir'] ?>">

                        </div>
                    </div>

                    <div class="dropdown-divider"></div>

                    <div class="form-row">
                        <div class="col form-group">
                            <label for="">Jurusan</label>
                            <input type="text" value="<?= $datamhs['mhs_jurusan'] ?>" readonly class="form-control">
                        </div>

                        <div class="col form-group">
                            <label for="">Wisuda Ke</label>
                            <input type="text" name="wisudake" readonly value="<?= $datamhs['mhs_wisuda_ke'] ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col form-group">
                        <label for="">Nomor Handphone</label>
                        <input type="number" required readonly value="<?= $datamhs['mhs_tlpon'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" readonly class="form-control" id="" cols="30" rows="5" placeholder="Alamat"><?= $datamhs['mhs_alamat'] ?></textarea>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section><!-- End Contact Section -->