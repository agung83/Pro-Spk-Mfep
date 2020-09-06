<?php
include "../../model/conn.php";

$id = $_POST['id'];

$data = $koneksi->query("SELECT * FROM tbl_siswa WHERE siswa_id = '$id'")->fetch_assoc();
echo json_encode($data);
