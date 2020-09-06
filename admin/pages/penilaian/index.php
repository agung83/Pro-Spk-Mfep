<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Penilaian</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Penilaian</div>
        <div class="card-body">
            <a class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal" style="margin-top: -10px; " href="#"><i class="fa fa-plus"></i></a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nilai Rata - Rata</th>
                            <th>Nilai Kehadiran</th>
                            <th>Penghasilan Orang Tua</th>
                            <th>Tanggungan Orang Tua</th>
                            <th>Aksi</th>
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
                                $kehadiran = "Alpa > 2";
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

                                <td>
                                    <button type="button" onclick="tampilModal('<?= $pecah['nilai_id'] ?>')" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                    <a class="btn btn-danger" href="hapus-nilai-<?= $pecah['nilai_id']  ?>.html"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php
                if (isset($_POST['save'])) {
                    // if (isset($_POST['save'])) {
                    $db->tambahDataPenilaian($_POST);
                    echo "     <script>alert('data berhasil disimpan')</script>";
                    echo "     <script>window.location='penilaian.html'</script>";
                }
                ?>
                <div class="container">
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="font-weight-bold">Siswa</label>
                            <select name="siswa" id="siswa" class="form-control" required>
                                <option value="">--Silahkan Pilih--</option>
                                <?php
                                $siswa = $db->tampilDataSiswa();
                                foreach ($siswa as $no => $pecah) :
                                ?>
                                    <option value="<?= $pecah['siswa_id'] ?>"><?= $pecah['siswa_nama'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Nilai Rata-Rata</label>
                            <input type="number" name="ratarata" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Nilai Kehadiran</label>
                            <select name="kehadiran" id="kehadiran" class="form-control">
                                <option value="">--Silahkan Pilih--</option>
                                <option value="4">Alpa < 1</option> <option value="3">Alpa = 1</option>
                                <option value="2">Alpa = 2</option>
                                <option value="1">Alpa > 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Penghasilan Orang Tua</label>
                            <select name="penghasilan" id="penghasilan" class="form-control">
                                <option value="">--Silahkan Pilih--</option>
                                <option value="4">Penghasilan ≤ Rp.1.000.000</option>
                                <option value="3">Rp.1.000.000 < Penghasilan ≥ Rp.3.000.000</option> <option value="2">Rp.3.000.000 < Penghasilan ≥ Rp.5000.000</option> <option value="1">Penghasilan > 5.000.000</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Tanggungan Orang Tua</label>
                            <select name="tanggungan" id="tanggungan" class="form-control">
                                <option value="">--Silahkan Pilih--</option>
                                <option value="1">1 Anak</option>
                                <option value="2">2 Anak</option>
                                <option value="3">3 Anak</option>
                                <option value="4">≥ 4 Anak</option>
                            </select>
                        </div>
                        <button name="save" type="submit" class="btn btn-primary btn-block mb-2">Simpan</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleEdit" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php if (isset($_POST['edit'])) {
                        $db->editdata($_POST);
                        echo "     <script>alert('data berhasil di edit')</script>";
                        echo "<meta http-equiv='refresh' content='0;url=admin.html'>";
                    } ?>
                    <input type="hidden" id="id" name="admin_id" class="form-control">
                    <div class="form-group">
                        <label>Nama admin</label>
                        <input type="text" class="form-control" id="admin_nama" name="admin_nama">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" id="admin_username" name="admin_username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="admin_password" name="admin_password">
                    </div>
                    <div class="form-group">
                        <img id="foto" width="200">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Gambar</label>
                        <input type="file" class="form-control-file" name="foto">
                    </div>



            </div>
            <div class="modal-footer">
                <button type="submit" name="edit" class="btn btn-warning">Edit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function tampilModal(id) {
        $.ajax({
            url: 'pages/admin/tampilEdit.php',
            type: 'POST',
            data: {
                'id': id
            },
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.admin_id)
                $('#admin_nama').val(data.admin_nama)
                $('#admin_username').val(data.admin_username)
                $('#admin_password').val(data.admin_password)
                document.getElementById('foto').src = 'images/admin/' + data.admin_foto
                $('#exampleEdit').modal()
            }
        })
    }
</script>