<?php
$idedit = $_GET['idedit'];
$admin = $db->ambilSatuId($idedit)[0];
// var_dump($admin);
// exit;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $db->editdata($_POST);

    echo "     <script>alert('data berhasil di rubah')</script>";
    echo "     <script>window.location='index.php?page=pages/admin/index'</script>";
}
?>
<div class="container">
    <div class="card mb-3  " style="width: 100%; ">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Edit Data Admin </div>
        <div class="card-body pl-5">


            <form action="" method="POST" style="width: 90%;" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $admin['admin_id']; ?>">

                <div class="form-group">
                    <label class="font-weight-bold">Nama Admin</label>
                    <input type="text" name="nama" value="<?= $admin['admin_nama']  ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Username</label>
                    <input type="text" name="username" value="<?= $admin['admin_username']  ?>" class="form-control" value="" required>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Password</label>
                    <input type="password" class="form-control" value="<?= $admin['admin_password']  ?>" name="pass" required>
                </div>
                <button name="ubah" type="submit" class="btn btn-primary btn-block">Ubah</button>
            </form>
        </div>
    </div>
</div>