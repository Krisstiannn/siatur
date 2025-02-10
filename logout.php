<?php
if (isset($_POST['btn_logout'])) {
    session_start();
    session_destroy();
     echo "<script type= 'text/javascript'>
     alert('Data Berhasil Dihapus!');
     document.location.href = 'login.php';
    </script>";
    exit();

}
?>