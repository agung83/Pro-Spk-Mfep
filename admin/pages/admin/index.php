<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Admin</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Admin</div>
        <div class="card-body">
            <a class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal" style="margin-top: -10px; " href="#"><i class="fa fa-plus"></i></a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Admin</th>
                            <th>Username Admin</th>
                            <th>Password Admin</th>
                            <th>Foto</th>

                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $dataadmin = $db->tampilDataAdmin();
                        //var_dump($dataadmin);
                        foreach ($dataadmin as $no => $pecah) :
                        ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td><?= $pecah['admin_nama'] ?></td>
                                <td><?= $pecah['admin_username'] ?></td>
                                <td><?= substr($pecah['admin_password'], 0, 8) ?></td>
                                <td><img style="width: 100px;" src="images/admin/<?= $pecah['admin_foto'] ?>" alt=""></td>

                                <td>
                                    <button type="button" onclick="tampilModal('<?= $pecah['admin_id'] ?>')" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                    <a class="btn btn-danger" href="hapus-admin-<?= $pecah['admin_id']  ?>.html"><i class="fa fa-trash"></i></a>
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
                    $db->tambahData($_POST);
                    echo "     <script>alert('data berhasil disimpan')</script>";
                    echo "     <script>window.location='admin.html'</script>";
                }
                ?>
                <div class="container">


                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="font-weight-bold">Nama Admin</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Username</label>
                            <input type="text" name="username" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Password</label>
                            <input type="password" class="form-control" name="pass" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Foto</label>
                            <input type="file" class="form-control-file" name="foto" required>
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