<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "siatur";

$conn = mysqli_connect($hostname, $username, $password, $db_name);

if ($conn->connect_errno) {
    echo "Koneksi Database Gagal";
    die("error!");
}
?>