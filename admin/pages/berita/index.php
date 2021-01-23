<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Informasi</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Admin</div>
        <div class="card-body">
            <a class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal" style="margin-top: -10px; " href="#">Tambah Data</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Berita Judul</th>
                            <th>Berita Isi</th>
                            <th>Berita Tgl</th>
                            <th>Berita Gambar</th>

                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $berita = $db->tampilBerita();

                        foreach ($berita as $no => $pecah) :


                        ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td><?= $pecah['berita_judul'] ?></td>
                                <td><?= substr($pecah['berita_isi'], 0, 30) ?></td>
                                <td><?= $pecah['berita_tgl'] ?></td>
                                <td><img style="width: 100px;" src="images/berita/<?= $pecah['berita_gambar'] ?>" alt=""></td>

                                <td>
                                    <button type="button" onclick="tampilModal('<?= $pecah['berita_id'] ?>')" class="btn btn-warning btn-block mb-2">Edit</button>
                                    <a class="btn btn-danger" href="hapus-berita-<?= $pecah['berita_id'] ?>.html">Hapus</a>
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
<div class=" modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="container">


                    <form action="" method="POST" enctype="multipart/form-data">
                        <?php if (isset($_POST['save'])) {
                            $db->saveBerita($_POST);
                            echo "     <script>alert('data berhasil disimpan')</script>";
                            echo "<meta http-equiv='refresh' content='0;url=berita.html'>";
                        } ?>
                        <div class="form-group">
                            <label class="font-weight-bold">Judul Berita</label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Isi Berita</label>

                            <textarea name="isi" id="" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal Berita</label>
                            <input type="date" class="form-control" name="tgl" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Gambar</label>
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
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label class="font-weight-bold">Judul Berita</label>
                        <input type="text" name="judul" id="judul" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Isi Berita</label>
                        <!-- <input type="text" name="isi" id="isi" class="form-control" value="" required> -->
                        <textarea name="isi" id="isi" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Tanggal Berita</label>
                        <input type="date" id="tgl" class="form-control" name="tgl" required>
                    </div>

                    <div class="form-group">
                        <img id="foto" width="200">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Gambar</label>
                        <input type="file" class="form-control-file" name="foto">
                    </div>

                    <button name="edit" type="submit" class="btn btn-warning btn-block mb-2">Edit</button>
                </form>
                <?php if (isset($_POST['edit'])) {
                    $db->editBerita($_POST);
                    echo "     <script>alert('data berhasil di edit')</script>";
                    echo "<meta http-equiv='refresh' content='0;url=berita.html'>";
                } ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<script>
    function tampilModal(id) {
        $.ajax({
            url: 'pages/berita/tampilEdit.php',
            type: 'POST',
            data: {
                'id': id
            },
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.berita_id)
                $('#judul').val(data.berita_judul)
                $('#isi').val(data.berita_isi)
                $('#tgl').val(data.berita_tgl)
                document.getElementById('foto').src = 'images/berita/' + data.berita_gambar
                $('#exampleEdit').modal()
            }
        })
    }
</script>