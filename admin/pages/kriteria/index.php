<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Kriteria</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Kriteria</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kriteria</th>
                            <th>Bobot</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $datakriteria = $db->tampilDataKriteria();
                        foreach ($datakriteria as $no => $pecah) :

                            @$jumlah +=  $pecah['kriteria_bobot'];
                        ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td><?= $pecah['kriteria_nama'] ?></td>
                                <td><?= $pecah['kriteria_bobot'] ?></td>
                                <td>
                                    <button type="button" onclick="tampilModal('<?= $pecah['kriteria_id'] ?>')" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Jumlah Nilai</td>
                            <td><span>Pastikan Nilai Jumlah Dari Kriteria</span></td>
                            <td><?= $jumlah ?></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleEdit" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php if (isset($_POST['edit'])) {
                        $db->editKriteria($_POST);
                        echo "     <script>alert('Berhasil')</script>";
                        echo "<meta http-equiv='refresh' content='0;url=kriteria.html'>";
                    } ?>
                    <input type="hidden" id="id" name="kriteria_id" class="form-control">
                    <div class="form-group">
                        <label>Kriteria</label>
                        <input type="text" class="form-control" id="kriteria_nama" name="kriteria_nama">
                    </div>
                    <div class="form-group">
                        <label>Nilai Bobot</label>
                        <input type="text" class="form-control" id="nilai_bobot" name="nilai_bobot">
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
            url: 'pages/kriteria/tampilEdit.php',
            type: 'POST',
            data: {
                'id': id
            },
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.kriteria_id)
                $('#kriteria_nama').val(data.kriteria_nama)
                $('#nilai_bobot').val(data.kriteria_bobot)
                // $('#admin_password').val(data.admin_password)
                // document.getElementById('foto').src = 'images/admin/' + data.admin_foto
                $('#exampleEdit').modal()
            }
        })
    }
</script>