<?php
$idhapus = $_GET['idhapus'];

$db->HapusSiswa($idhapus);
echo "
   <script>
   alert('data berhasil di hapus');
   window.location='siswa.html'
   </script>";
