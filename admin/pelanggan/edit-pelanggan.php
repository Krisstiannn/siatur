<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pelanggan</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/siatur/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/siatur/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/siatur/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/siatur/dist/css/adminlte.min.css">
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
                            <h1>Edit Data Pelanggan</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="content-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Input Pelanggan</h3>
                        </div>
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Pelanggan</label>
                                    <input type="text" class="form-control" id="nama_pelanggan"
                                        placeholder="Nama Pelanggan">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat Rumah Atau Titik Kordinat</label>
                                    <input type="text" class="form-control" id="alamat"
                                        placeholder="Masukkan Alamat Rumah Atau Titik Kordinat">
                                </div>
                                <div class="form-group">
                                    <label for="whatsapp">Nomor WhatsApp</label>
                                    <input type="text" class="form-control" id="no_wa" placeholder="Nomor WhatsApp">
                                </div>
                                <div class="form-group">
                                    <label for="layanan">Jenis Layanan Yang Digunakan</label>
                                    <input type="text" class="form-control" id="jenis_layanan"
                                        placeholder="Jenis Layanan Yang Digunakan">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" id="status">
                                        <option>-- Pilih Status --</option>
                                        <option>Aktif</option>
                                        <option>Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success" id="btn_submit">Submit</button>
                                <button type="submit" class="btn btn-danger" id="btn_cancel">Cancel</button>
                            </div>
                        </form>
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
    <script src="/siatur/plugins/daterangepicker/daterangepicker.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>