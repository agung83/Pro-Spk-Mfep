<?php
$idhapus = $_GET['idhapus'];

$db->hapusBerita($idhapus);
echo "
   <script>
   alert('data berhasil di hapus');
   window.location='berita.html'
   </script>";
