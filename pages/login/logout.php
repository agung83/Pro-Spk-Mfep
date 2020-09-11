<?php

session_unset();
session_destroy();

echo "<script>
alert('anda telah logout');
window.location='?page=home';
</script>";
