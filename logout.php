<?php
if (isset($_POST['btn_logout'])) {
    session_start();
    session_destroy();
     echo "<script type= 'text/javascript'>
     alert('Anda Telah Keluar!');
     document.location.href = 'login.php';
    </script>";
    exit();

}
?>