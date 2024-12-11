<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data karyawan</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <?php include "../layouts/loading.php"?>

        <!-- Navbar -->
        <?php include "../layouts/header.php"?>
        <!-- Navbar -->

        <!-- Main Sidebar Container -->
        <?php include "../layouts/sidebar.php"?>
        <!-- END Main Sidebar -->

        <!-- Main Content -->
        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Karyawan</h1>
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
                                    <h3 class="card-title">Latest Orders</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nomor Induk Pegawai</th>
                                                    <th>Nama Karayawan</th>
                                                    <th>Posisi/Jabatan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                                    <td>Call of Duty IV</td>
                                                    <td><span class="badge badge-success">Shipped</span></td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-block btn-info btn-xs">Edit</button>
                                                        <button type="button"
                                                            class="btn btn-block btn-danger btn-xs">Hapus</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                                    <td>Samsung Smart TV</td>
                                                    <td><span class="badge badge-warning">Pending</span></td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-block btn-info btn-xs">Edit</button>
                                                        <button type="button"
                                                            class="btn btn-block btn-danger btn-xs">Hapus</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                                    <td>iPhone 6 Plus</td>
                                                    <td><span class="badge badge-danger">Delivered</span></td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-block btn-info btn-xs">Edit</button>
                                                        <button type="button"
                                                            class="btn btn-block btn-danger btn-xs">Hapus</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                                    <td>Samsung Smart TV</td>
                                                    <td><span class="badge badge-info">Processing</span></td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-block btn-info btn-xs">Edit</button>
                                                        <button type="button"
                                                            class="btn btn-block btn-danger btn-xs">Hapus</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                                    <td>Samsung Smart TV</td>
                                                    <td><span class="badge badge-warning">Pending</span></td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-block btn-info btn-xs">Edit</button>
                                                        <button type="button"
                                                            class="btn btn-block btn-danger btn-xs">Hapus</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                                    <td>iPhone 6 Plus</td>
                                                    <td><span class="badge badge-danger">Delivered</span></td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-block btn-info btn-xs">Edit</button>
                                                        <button type="button"
                                                            class="btn btn-block btn-danger btn-xs">Hapus</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                                    <td>Call of Duty IV</td>
                                                    <td><span class="badge badge-success">Shipped</span></td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-block btn-info btn-xs">Edit</button>
                                                        <button type="button"
                                                            class="btn btn-block btn-danger btn-xs">Hapus</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer clearfix">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-success float-right ">Tambah
                                        Data</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- END Main Content -->

        <!-- Main Footer -->
        <?php include "../layouts/footer.php"?>
        <!-- End Footer -->
    </div>

    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="../dist/js/adminlte.js"></script>
    <script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../plugins/raphael/raphael.min.js"></script>
    <script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <script src="../dist/js/demo.js"></script>
    <script src="../dist/js/pages/dashboard2.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>