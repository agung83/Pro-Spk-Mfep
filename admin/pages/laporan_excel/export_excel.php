<?php
include '../../model/Db.php';
$db = new Db();
date_default_timezone_set("Asia/Bangkok");
function TanggalIndo($date)
{
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);

    $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
    return ($result);
}


header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Laporan Penilaian.xls");



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>SMK N 1 Kinali</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <style type="text/css">
        #mapid {
            height: 600px;
            /* width: 400px; */
        }

        /*design table 1*/
        .table1 {
            font-family: sans-serif;
            color: #232323;
            border-collapse: collapse;
        }

        .table1 th,
        td {
            border: 1px solid #999;
            padding: 8px 20px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


</head>

<body id="page-top">
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <center>
        <h3 style="color: brown; margin-top: 10px;"><b>SMK N 1 Kinali</b></h3>
    </center>
    <center>
        <h3> <u>LAPORAN DATA SISWA YANG MENDAPATKAN BEASISWA SMK N 1 KINALI </u> </h3>
    </center>
    <table border="1" class="table1" width="100%" cellspacing="0">
        <thead>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Nama Siswa</th>
            <th style="text-align: center;">Jenis Kelamin</th>
            <th style="text-align: center;">Alamat</th>
            <th style="text-align: center;">Telp</th>
            <th style="text-align: center;">Kelas</th>
            <th style="text-align: center;">Jurusan</th>
            <th style="text-align: center;">Total Nilai Perhitungan</th>
            <th style="text-align: center;">Rank</th>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $no2 = 1;
            $ambil = $koneksi->query("SELECT * FROM tbl_rank a JOIN tbl_siswa b ON a.siswa_id=b.siswa_id WHERE a.status_acc = 'acc' ORDER BY a.nilai_ev DESC");
            while ($pecah = $ambil->fetch_array()) {
            ?>
                <tr>
                    <td style="text-align: center;"><?= $no++ ?></td>
                    <td style="text-align: center;"><?= $pecah['siswa_nama'] ?></td>
                    <td style="text-align: center;"><?= $pecah['siswa_jk'] ?></td>
                    <td style="text-align: center;"><?= $pecah['siswa_alamat']  ?></td>
                    <td style="text-align: center;"><?= $pecah['siswa_nohp'] ?></td>
                    <td style="text-align: center;"><?= $pecah['siswa_kelas'] ?></td>
                    <td style="text-align: center;"><?= $pecah['siswa_jurusan'] ?></td>
                    <td style="text-align: center;"><?= $pecah['nilai_ev'] ?></td>
                    <td style="text-align: center;"><?= $no2++ ?></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../assets/vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="../../assets/js/sb-admin.min.js"></script>
    <script src="../../assets/js/demo/datatables-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>



</html>