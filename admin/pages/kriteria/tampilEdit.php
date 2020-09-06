<?php
include "../../model/conn.php";

$id = $_POST['id'];

$data = $koneksi->query("SELECT * FROM tbl_kriteria WHERE kriteria_id = '$id'")->fetch_assoc();
echo json_encode($data);
