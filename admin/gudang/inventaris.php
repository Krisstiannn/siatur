<?php 
include "/xampp/htdocs/siatur/services/koneksi.php";

$query_tampilData = "SELECT * FROM inventaris";
$result_tampilData = $conn->query($query_tampilData);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gudang | Inventaris</title>
    <<link rel="preconnect" href="https://fonts.googleapis.com">
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
        <?php include "/xampp/htdocs/siatur/layouts/header.php"?>
        <!-- Navbar -->

        <!-- Main Sidebar Container -->
        <?php include "/xampp/htdocs/siatur/layouts/sidebar.php"?>
        <!-- END Main Sidebar -->

        <!-- Main Content -->
        <div class="content-wrapper bg-gradient-white">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Inventaris</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <a href="tambah-inventaris.php" class="btn btn-sm btn-success ">Tambah
                                                Data</a>
                                        </div>

                                        <div class="card-title float-right">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                                <input type="text" name="table_search" class="form-control float-right"
                                                    placeholder="Search">

                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center">
                                            <thead class="bg-gradient-cyan">
                                                <tr>
                                                    <th>Kode Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Kondisi Barang</th>
                                                    <th>Jumlah Barang</th>
                                                    <th>Gambar Barang</th>
                                                    <th>Tanggal Masuk Barang</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <?php foreach ($result_tampilData as $inventaris) {?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $inventaris['kode_barang']?></td>
                                                    <td><?= $inventaris['nama_barang']?></td>
                                                    <td><?= $inventaris['kondisi_barang']?></td>
                                                    <td><?= $inventaris['jumlah_barang']?></td>
                                                    <td>
                                                        <img src="/siatur/storage/img/<?= $inventaris['gambar_barang']?>" alt="<?= $inventaris['gambar_barang']?>" style="width: 100px;">
                                                    </td>
                                                    <td><?= $inventaris['tanggal_masuk']?></td>
                                                    <td>
                                                        <a class="btn btn-info btn-sm"
                                                            href="edit-inventaris.php?id=<?= $inventaris['id']?>">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-sm"
                                                            href="hapus-inventaris.php?id=<?= $inventaris['id']?>">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php }?>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- END Main Content -->

        <!-- Main Footer -->
        <?php include "/xampp/htdocs/siatur/layouts/footer.php"?>
        <!-- End Footer -->
    </div>

    <script src="/siatur/plugins/jquery/jquery.min.js"></script>
    <script src="/siatur/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/siatur/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="/siatur/dist/js/adminlte.js"></script>
    <script src="/siatur/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="/siatur/plugins/raphael/raphael.min.js"></script>
    <script src="/siatur/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="/siatur/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <script src="/siatur/plugins/chart.js/Chart.min.js"></script>
    <script src="/siatur/dist/js/demo.js"></script>
    <script src="/siatur/dist/js/pages/dashboard2.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>