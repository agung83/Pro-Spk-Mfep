<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Hasil Perangkingan</li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Ranking
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-primary">
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Total Nilai</th>
                            <th>Ranking</th>
                            <th>Aksi</th>
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
                                <?php if ($pecah['status_acc'] == 'tidak acc') { ?>
                                    <td><button type="button" onclick="aprove('<?= $pecah['rank_id']; ?>')" class="btn btn-danger btn-sm">Verivikasi</button></td>
                                <?php } else { ?>
                                    <td><button type="button" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button></td>
                                <?php } ?>

                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalAprove">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="modal-title text-center">Yakin Ingin Aprove Berkas..?</h4>
                <form action="" method="POST">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" value="acc" name="status">
            </div>
            <div class="modal-footer">
                <button type="submit" name="simpan" class="btn btn-primary btn-sm">Iya</button>
                <button type="reset" data-dismiss="modal" class="btn btn-danger btn-sm">Batal</button>
            </div>
            </form>
            <?php
            if (isset($_POST['simpan'])) {
                $id =   $_POST['id'];
                $status = $_POST['status'];

                $update = $koneksi->query("UPDATE tbl_rank SET status_acc = '$status' WHERE rank_id = '$id'");

                echo $update == true ? "<script>alert('Berhasil di ACC');window.location='rangkingkepsek.html'</script>" : "<script>alert('gagal di ACC');window.location='rangkingkepsek.html</script>";
            }

            ?>
        </div>
    </div>
</div>

<script>
    function aprove(id) {
        $('#id').val(id)
        $('#modalAprove').modal()
    }
</script>