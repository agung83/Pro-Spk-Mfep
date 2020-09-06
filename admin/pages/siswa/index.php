<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Siswa</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Siswa</div>
        <div class="card-body">
            <a class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal" style="margin-top: -10px; " href="#"><i class="fa fa-plus"></i></a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>

                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $dataSiswa = $db->tampilDataSiswa();
                        //var_dump($dataSiswa);
                        foreach ($dataSiswa as $no => $pecah) :
                        ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td><?= $pecah['siswa_nis'] ?></td>
                                <td><?= $pecah['siswa_nama'] ?></td>
                                <td><?= $pecah['siswa_jk'] ?></td>
                                <td><?= $pecah['siswa_alamat'] ?></td>
                                <td><?= $pecah['siswa_nohp'] ?></td>
                                <td><?= $pecah['siswa_kelas'] ?></td>
                                <td><?= $pecah['siswa_jurusan'] ?></td>
                                <td>
                                    <button type="button" onclick="tampilModal('<?= $pecah['siswa_id'] ?>')" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                    <a class="btn btn-danger" href="hapus-siswa-<?= $pecah['siswa_id']  ?>.html"><i class="fa fa-trash"></i></a>
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
                    $db->tambahDataSiswa($_POST);
                    echo "     <script>alert('data berhasil disimpan')</script>";
                    echo "     <script>window.location='siswa.html'</script>";
                }
                ?>
                <div class="container">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="font-weight-bold">NIS</label>
                            <input type="text" name="nis" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Nama</label>
                            <input type="text" name="nama" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Jenis Kelamin</label>
                            <select name="jk" id="jk" class="form-control" required>
                                <option value="">--Silahkan Pilih--</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">No HP</label>
                            <input type="number" name="nohp" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Kelas</label>
                            <select name="kelas" id="kelas" class="form-control" required>
                                <option value="">--Silahkan Pilih--</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control" required>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
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
                        <label class="font-weight-bold">NIS</label>
                        <input type="text" name="nis" id="nis" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <option value="">--Silahkan Pilih--</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">No HP</label>
                        <input type="number" name="nohp" id="nohp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Kelas</label>
                        <select name="kelas" id="kelas" class="form-control">
                            <option value="">--Silahkan Pilih--</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Jurusan</label>
                        <input type="text" name="jurusan" id="jurusan" class="form-control">
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
            url: 'pages/siswa/tampilEdit.php',
            type: 'POST',
            data: {
                'id': id
            },
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.siswa_id)
                $('#nis').val(data.siswa_nis)
                $('#nama').val(data.siswa_nama)
                $('#jk').val(data.siswa_jk)
                $('#alamat').val(data.siswa_alamat)
                $('#nohp').val(data.siswa_nohp)
                $('#kelas').val(data.siswa_kelas)
                $('#jurusan').val(data.siswa_jurusan)
                // document.getElementById('foto').src = 'images/admin/' + data.admin_foto
                $('#exampleEdit').modal()
            }
        })
    }
</script>