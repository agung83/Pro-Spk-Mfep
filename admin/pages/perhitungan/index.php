<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Perhitungan</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Kriteria Bobot</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-primary">
                            <th>No</th>
                            <th>Nama Kriteria</th>
                            <th>Nilai Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $kriteria = $db->tampilDataKriteria();
                        foreach ($kriteria as $no => $pecah) :
                            @$jumlah += $pecah['kriteria_bobot'];
                        ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td><?= $pecah['kriteria_nama'] ?></td>
                                <td class="text-center"><?= $pecah['kriteria_bobot'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Jumlah</td>
                            <td></td>
                            <td class="text-center"><?= @$jumlah ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Penilaian</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-primary">
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nilai Rata - Rata</th>
                            <th>Nilai Kehadiran</th>
                            <th>Penghasilan Orang Tua</th>
                            <th>Tanggungan Orang Tua</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $penilaian = $db->tampilDataPenilaian();
                        foreach ($penilaian as $no => $pecah) :
                            $hadir = $pecah['nilai_kehadiran'];
                            $penghasilan = $pecah['nilai_penghasilan_ortu'];
                            $tanggungan = $pecah['nilai_tanggungan'];

                            if ($hadir == 4) {
                                $kehadiran = "Alpa < 1";
                            } elseif ($hadir == 3) {
                                $kehadiran = "Alpa = 1";
                            } elseif ($hadir == 2) {
                                $kehadiran = "Alpa = 2";
                            } else {
                                $kehadiran = "Alpa > 3";
                            }

                            if ($penghasilan == 4) {
                                $Portu = "Penghasilan ≤ Rp.1.000.000";
                            } elseif ($penghasilan == 3) {
                                $Portu = "Rp.1.000.000 < Penghasilan ≥ Rp.3.000.000";
                            } elseif ($penghasilan == 2) {
                                $Portu = "Rp.3.000.000 < Penghasilan ≥ Rp.5000.000";
                            } else {
                                $Portu = "Penghasilan > 5.000.000";
                            }

                            if ($tanggungan == 4) {
                                $JA = "≥ 4 Anak";
                            } elseif ($tanggungan == 3) {
                                $JA = "3 Anak";
                            } elseif ($tanggungan == 2) {
                                $JA = "2 Anak";
                            } else {
                                $JA = "1 Anak";
                            }
                        ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td><?= $pecah['siswa_nama'] ?></td>
                                <td><?= $pecah['nilai_rata_asli'] ?></td>
                                <td><?= $kehadiran ?></td>
                                <td><?= $Portu ?></td>
                                <td><?= $JA ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Penilaian</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-primary">
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nilai Rata - Rata</th>
                            <th>Nilai Kehadiran</th>
                            <th>Penghasilan Orang Tua</th>
                            <th>Tanggungan Orang Tua</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $penilaian = $db->tampilDataPenilaian();
                        foreach ($penilaian as $no => $pecah) :
                        ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td><?= $pecah['siswa_nama'] ?></td>
                                <td class="text-center"><?= $pecah['nilai_rata'] ?></td>
                                <td class="text-center"><?= $pecah['nilai_kehadiran'] ?></td>
                                <td class="text-center"><?= $pecah['nilai_penghasilan_ortu'] ?></td>
                                <td class="text-center"><?= $pecah['nilai_tanggungan'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Normalisai</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-primary">
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nilai Rata - Rata</th>
                            <th>Nilai Kehadiran</th>
                            <th>Penghasilan Orang Tua</th>
                            <th>Tanggungan Orang Tua</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $dataKriteria = $db->tampilDataKriteria();
                        $penilaian = $db->tampilDataPenilaian();
                        foreach ($penilaian as $no => $pecah) :
                            foreach ($dataKriteria as $key => $pecah2) {
                                $datak[] = $pecah2;
                            }


                            $juml = ($pecah['nilai_rata'] * $datak[0]['kriteria_bobot']) + ($pecah['nilai_kehadiran'] * $datak[1]['kriteria_bobot']) + ($pecah['nilai_penghasilan_ortu'] * $datak[2]['kriteria_bobot']) + ($pecah['nilai_tanggungan'] * $datak[3]['kriteria_bobot'])

                        ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td><?= $pecah['siswa_nama'] ?></td>
                                <td class="text-center"><?= $pecah['nilai_rata'] * $datak[0]['kriteria_bobot'] ?></td>
                                <td class="text-center"><?= $pecah['nilai_kehadiran'] * $datak[1]['kriteria_bobot'] ?></td>
                                <td class="text-center"><?= $pecah['nilai_penghasilan_ortu'] * $datak[2]['kriteria_bobot'] ?></td>
                                <td class="text-center"><?= $pecah['nilai_tanggungan'] * $datak[3]['kriteria_bobot'] ?></td>
                                <td class="text-center"><?= $juml ?></td>
                            </tr>
                            <form action="" method="post">
                                <input type="hidden" name="id_siswa[]" value="<?= $pecah['siswa_id'] ?>">
                                <input type="hidden" name="total[]" value="<?= $juml ?>">

                            <?php endforeach;


                        // echo "<pre>";
                        // var_dump($datak);
                        // echo "<pre>";
                            ?>


                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-primary mb-2" type="submit" name="simpan">Lihat Rangking</button>
    </div>
    </form>
    <?php
    if (isset($_POST['simpan'])) {
        $id = $_POST['id_siswa'];
        $total = $_POST['total'];
        foreach ($id as $key => $value) {
            $koneksi->query("DELETE FROM tbl_rank WHERE siswa_id = '$id[$key]'");
            $koneksi->query("INSERT INTO `tbl_rank`(`siswa_id`, `nilai_ev`) VALUES ('$id[$key]','$total[$key]')");
        } ?>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Data Ranking</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                        <thead>
                            <tr class="bg-primary">
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Total Nilai</th>
                                <th>Ranking</th>
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
                                    <td><?= $pecah['siswa_nama'] ?></td>
                                    <td class="text-center"><?= $pecah['nilai_ev'] ?></td>
                                    <td class="text-center"><?= $no++ ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php }
    ?>


</div>