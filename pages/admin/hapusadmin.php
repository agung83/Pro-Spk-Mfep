<?php
$idhapus = $_GET['idhapus'];

$db->HapusData($idhapus);
echo "
   <script>
   alert('data berhasil di hapus');
   window.location='admin.html'
   </script>";
