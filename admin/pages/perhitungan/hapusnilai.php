<?php
$idhapus = $_GET['idhapus'];
$db->HapusPenilaian($idhapus);
echo "
   <script>
   alert('data berhasil di hapus');
   window.location='penilaian.html'
   </script>";
