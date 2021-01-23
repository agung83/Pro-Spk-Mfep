<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb bg-white">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Laporan</li>
    </ol>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <i class="fas fa-users"></i>
                        Laporan Data Beasiswa SMK N 1 Kinali
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <?php $data = $koneksi->query("SELECT COUNT(status_acc) as total_acc FROM tbl_rank WHERE status_acc ='acc'")->fetch_array();
                            if ($data['total_acc'] > 0) {
                            ?>
                                <form action="pages/laporan_excel/export_excel.php" target="_blank" method="post">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-print"></i> Export Excel</button>
                                </form>

                            <?php } else { ?>
                                <div class="alert alert-danger">Laporan Data Beasiswa Belum Di Acc Kepala Sekolah</div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>