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
            <form action="" method="POST">
                <button id="delete_data" class="btn btn-danger btn-sm mb-3" name="update" type="button" disabled=""><i class="fa fa-trash-o"></i> Verifikasi</button>

                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered basic-datatables" id="tables_checkbox">
                        <thead>
                            <tr class="bg-primary">
                                <th width="3%" style="text-align:center;">
                                    <input type="checkbox" class="square-blue">
                                </th>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Total Nilai</th>
                                <th>Ranking</th>
                                <th>Status acc</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rank = $db->tampilDataRank();
                            $no = 1;
                            foreach ($rank as $no => $pecah) :
                            ?>
                                <tr>
                                    <td align="center">
                                        <input type="checkbox" class="square-blue checkid" name="checkid[]" value="<?php echo $pecah['rank_id']; ?>">
                                    </td>
                                    <td><?= ++$no ?></td>
                                    <td><?= $pecah['siswa_nama'] ?></td>
                                    <td class="text-center"><?= $pecah['nilai_ev'] ?></td>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?php if ($pecah['status_acc'] == 'acc') { ?>
                                            <button class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
                                        <?php } else { ?>
                                            <button class="btn btn-danger btn-sm">Belum ACC</button>
                                        <?php } ?>
                                    </td>

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

                <input type="hidden" id="id" name="id">
                <input type="hidden" value="acc" name="status">
            </div>
            <div class="modal-footer">
                <button type="submit" name="update" class="btn btn-primary btn-sm">Iya</button>
                <button type="reset" data-dismiss="modal" class="btn btn-danger btn-sm">Batal</button>
            </div>
            </form>
            <?php
            if (isset($_POST['update'])) {
                $status = $_POST['status'];
                foreach ($_POST['checkid'] as $key => $pecah) {
                    // echo "<pre>";
                    // print_r($pecah);
                    // echo "</pre>";
                    $update = $koneksi->query("UPDATE tbl_rank SET status_acc = '$status' WHERE rank_id = '$pecah'");
                }
                echo $update == true ? "<script>alert('Berhasil di ACC');window.location='rangkingkepsek.html'</script>" : "<script>alert('gagal di ACC');window.location='rangkingkepsek.html</script>";
            }

            ?>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('input[type="checkbox"].square-blue').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            increaseArea: '20%' // optional
        });

        $('.basic-datatables').dataTable({
            "ordering": false
        });
        $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search Data');
        $('.dataTables_length select').addClass('form-control');

        var checkedAll = $('#tables_checkbox > thead > tr > th input[type=checkbox]');
        var checkedBox = $('#tables_checkbox > tbody > tr > td input[type=checkbox]');

        //select/deselect all rows according to table header checkbox
        checkedAll.eq(0).on('ifChecked ifUnchecked', function(event) {
            $('#tables_checkbox').find('tbody > tr').each(function() {
                var row = this;
                if (event.type == 'ifChecked') {
                    $(row).find('td input[type=checkbox]').iCheck('check');
                    document.getElementById("delete_data").disabled = false;
                } else {
                    $(row).find('td input[type=checkbox]').iCheck('uncheck');
                    document.getElementById("delete_data").disabled = true;
                }
            });
        });

        // select / deselect a row when the checkbox is checked / unchecked
        $(document).on('ifChanged', '#tables_checkbox > tbody > tr > td input[type=checkbox]', function(event) {
            var n = $('#tables_checkbox > tbody > tr > td input[type=checkbox]').filter(':checked').length;
            var rowCount = $('#tables_checkbox > tbody > tr > td input[type=checkbox]').length;

            if (n > 0)
                document.getElementById("delete_data").disabled = false;
            else
                document.getElementById("delete_data").disabled = true;

            if (rowCount == n)
                checkedAll.prop('checked', 'checked');
            else
                checkedAll.removeProp('checked');

            checkedAll.iCheck('update');
        });

    });

    $(document).on('click', '#delete_data', function(e) {

        $('#modalAprove').modal()

    })
</script>