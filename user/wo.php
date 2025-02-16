<?php 
include "/xampp/htdocs/siatur/services/koneksi.php";
session_start();

$id_karyawan = $_SESSION['id_karyawan'] ?? null;

$query = "SELECT psb.nama_pelanggan, psb.alamat_pelanggan, psb.id, wo.id_karyawan
            FROM psb 
            JOIN wo ON wo.id_pekerjaan = psb.id 
            WHERE wo.id_karyawan = '$id_karyawan'";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Working Order</title>
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

<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include "/xampp/htdocs/siatur/layouts/header.php"?>
        <!-- Navbar -->

        <!-- Main Sidebar Container -->
        <?php include "/xampp/htdocs/siatur/layouts/sidebar-user.php"?>
        <!-- END Main Sidebar -->

        <!-- Main Content -->
        <div class="content-wrapper bg-gradient-white">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Working Order</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Left col -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <div class="card-tools">
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
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center">
                                            <thead class="bg-gradient-cyan">
                                                <tr>
                                                    <th>Nomor Working Order</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Alamat Rumah/Tikor</th>
                                                    <th>Status Pekerjaan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($result as $pekerjaan) { 
                                                        $id_pekerjaan = $pekerjaan['id'];

                                                        // Ambil semua status pekerjaan berdasarkan no_wo
                                                        $query_status = "SELECT status FROM report WHERE no_wo = '$id_pekerjaan'";
                                                        $result_status = $conn->query($query_status);

                                                        $total = 0;
                                                        $selesai = 0;
                                                        $kendala = 0;

                                                        while ($row_status = $result_status->fetch_assoc()) {
                                                            $total++;
                                                            if ($row_status['status'] === 'selesai') {
                                                                $selesai++;
                                                            } elseif ($row_status['status'] === 'kendala') {
                                                                $kendala++;
                                                            }
                                                        }

                                                        if ($kendala > 0) {
                                                            $status = '<span class="badge bg-danger">KENDALA</span>';
                                                        } elseif ($total > 0 && $selesai === $total) {
                                                            $status = '<span class="badge bg-success">SELESAI</span>';
                                                        } else {
                                                            $status = '<span class="badge bg-warning">ON GOING PROGRESS</span>';
                                                        }
                                                    ?>
                                                <tr>
                                                    <td><?= $pekerjaan['id']?></td>
                                                    <td><?= $pekerjaan['nama_pelanggan']?></td>
                                                    <td><?= $pekerjaan['alamat_pelanggan']?></td>
                                                    <td><?= $status?></td>
                                                    <td>
                                                        <a class="btn btn-warning btn-sm"
                                                            href="report-wo.php?id=<?= $pekerjaan['id']?>">
                                                            <i class="fas fa-pencil-alt"></i> Laporkan
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- <div class="card-footer clearfix">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-success float-right ">Tambah
                                        Data</a>
                                </div> -->
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