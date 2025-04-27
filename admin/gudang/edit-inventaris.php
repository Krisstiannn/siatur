<?php
session_start();
include "/xampp/htdocs/siatur/services/koneksi.php";

if (!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != true) {
    header("Location: /xampp/htdocs/siatur/login.php");
}

$id = $_GET['id'];
$query_tampilData = "SELECT * FROM inventaris WHERE id = '$id'";
$result_tampiData = $conn->query($query_tampilData)->fetch_assoc();

if (isset($_POST['btn_submit'])) {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $kondisi_barang = $_POST['kondisi_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    if ($_FILES['gambar_barang']['name'] == "") {
        $gambar_barang = $result_tampilData['gambar_barang'];
    } else {
        $gambar_barang = $_FILES['gambar_barang']['name'];
        unlink("/xampp/htdocs/siatur/storage/img/" . $result_tampiData['gambar_barang']);
        move_uploaded_file($_FILES['gambar_barang']['tmp_name'], "/xampp/htdocs/siatur/storage/img/" . $_FILES['gambar_barang']['name']);
    }

    // $dir_foto = "/xampp/htdocs/siatur/storage/img/";
    // $tmp_file = $_FILES['gambar_barang']['tmp_name'];
    // move_uploaded_file($tmp_file, $dir_foto.$gambar_barang);

    $query_editData = "UPDATE inventaris SET kode_barang = '$kode_barang', nama_barang = '$nama_barang', kondisi_barang = '$kondisi_barang', jumlah_barang = '$jumlah_barang',
    gambar_barang = '$gambar_barang', tanggal_masuk = '$tanggal_masuk' WHERE id = $id";
    $result_editData = $conn->query($query_editData);

    if ($result_editData) {
        echo "<script type= 'text/javascript'>
                alert('Data Berhasil dirubah!');
                document.location.href = 'inventaris.php';
            </script>";
    } else {
        echo "<script type= 'text/javascript'>
                alert('Data Berhasil dirubah!');
                document.location.href = 'edit-inventaris.php?id=$id';
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gudang | Inventaris</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/siatur/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/siatur/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/siatur/dist/css/adminlte.min.css">
    <link rel="icon" href="/siatur/storage/nsp.jpg">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include "/xampp/htdocs/siatur/layouts/header.php" ?>
        <!-- Navbar -->

        <!-- Main Sidebar Container -->
        <?php include "/xampp/htdocs/siatur/layouts/sidebar.php" ?>
        <!-- END Main Sidebar -->

        <!-- Main Content -->
        <div class="content-wrapper bg-gradient-white">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit Data Inventaris</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="content-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Barang</h3>
                        </div>
                        <form method="POST" action="edit-inventaris.php?id=<?= $result_tampiData['id'] ?>"
                            enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode">Kode Barang</label>
                                    <input type="text" class="form-control" name="kode_barang" placeholder="Kode Barang"
                                        value="<?= $result_tampiData['kode_barang'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar Barang</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="gambar_barang"
                                                value="<?= $result_tampiData['gambar_barang'] ?>" accept="image/*">
                                            <label class="custom-file-label"
                                                for="exampleInputFile"><?= $result_tampiData['gambar_barang'] ?></label>
                                        </div>
                                        <!-- <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang"
                                        placeholder="Masukkan Nama Barang"
                                        value="<?= $result_tampiData['nama_barang'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="kondisi">Kondisi Barang</label>
                                    <select class="custom-select" name="kondisi_barang">
                                        <option><?= $result_tampiData['kondisi_barang'] ?></option>
                                        <option>Baru</option>
                                        <option>Bekas</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="text" class="form-control" name="jumlah_barang" placeholder="Jumlah"
                                        value="<?= $result_tampiData['jumlah_barang'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Masuk Barang</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="date" class="form-control datetimepicker-input"
                                            data-target="#reservationdate" name="tanggal_masuk"
                                            value="<?= $result_tampiData['tanggal_masuk'] ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" name="btn_submit">Submit</button>
                                <a href="inventaris.php" type="submit" class="btn btn-danger"
                                    name="btn_cancel">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <!-- END Main Content -->

        <!-- Main Footer -->
        <?php include "/xampp/htdocs/siatur/layouts/footer.php" ?>
        <!-- End Footer -->
    </div>

    <script src="/siatur/plugins/jquery/jquery.min.js"></script>
    <script src="/siatur/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/siatur/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="/siatur/dist/js/adminlte.js"></script>
    <script src="/siatur/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="/siatur/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="/siatur/plugins/raphael/raphael.min.js"></script>
    <script src="/siatur/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="/siatur/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <script src="/siatur/plugins/chart.js/Chart.min.js"></script>
    <script src="/siatur/dist/js/demo.js"></script>
    <script src="/siatur/dist/js/pages/dashboard2.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>