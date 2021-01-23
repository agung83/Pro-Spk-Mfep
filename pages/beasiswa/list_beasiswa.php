<section id="contact" class="contact section-bg mt-5">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Ranking Beasiswa</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Nilai Evalusasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rank = $db->tampilDataRank();
                            $no = 1;
                            foreach ($rank as $no => $pecah) :
                            ?>
                                <tr>
                                    <td><?= ++$no ?></td>
                                    <td><?= $pecah['siswa_nama']  ?></td>
                                    <td><?= $pecah['siswa_kelas']  ?></td>
                                    <td><?= $pecah['siswa_jurusan']  ?></td>
                                    <td><?= $pecah['nilai_ev'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>
</section><!-- End Contact Section -->