<?php
session_start();
include "/xampp/htdocs/siatur/services/koneksi.php";

if (!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != true) {
    header("Location: /xampp/htdocs/siatur/login.php");
}

$id = $_GET['id'];
$query_gambar = "SELECT * FROM inventaris WHERE id = '$id'";
$result_gambar = $conn->query($query_gambar)->fetch_assoc();

unlink("/xampp/htdocs/siatur/storage/img/" . $result_gambar['gambar_barang']);

$query_hapusData = "DELETE FROM inventaris WHERE id = '$id'";
$result_hapusData = $conn->query($query_hapusData);

if ($result_gambar) {
    echo "<script type= 'text/javascript'>
                alert('Data Berhasil di Hapus!');
                document.location.href = 'inventaris.php';
            </script>";
}
