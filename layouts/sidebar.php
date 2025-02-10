<aside class="main-sidebar sidebar-dark-primary bg-blue shadow-lg elevation-5">
    <div class="brand-link bg-blue" style="border: none">
        <img src=" /siatur/storage/nsp.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text text-light">Net Sun Power</span>
    </div>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border: none">
            <div class="info">
                <span class="d-block text-light" style="font-size: 20px; text-transform: uppercase;"><?php echo $_SESSION['peran'];?></span>
            </div>
        </div>
        <nav class="mt-2 ">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/siatur/index.php" class="nav-link">
                        <ion-icon name="clipboard-outline" class="far nav-icon"></ion-icon>
                        <p class="text-light">Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <ion-icon name="archive-outline" class="far nav-icon"></ion-icon>
                        <p class="text-light">
                            Gudang
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/siatur/admin/gudang/inventaris.php" class="nav-link">
                                <i class="far nav-icon"></i>
                                <p class="text-light">Inventaris</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/siatur/admin/gudang/material.php" class="nav-link">
                                <i class="far nav-icon"></i>
                                <p class="text-light">Material</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <ion-icon name="people-outline" class="far nav-icon"></ion-icon>
                        <p class="text-light">
                            Karyawan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/siatur/admin/karyawan/datakaryawan.php" class="nav-link">
                                <i class="far nav-icon"></i>
                                <p class="text-light">Data Karyawan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/siatur/admin/karyawan/absen.php" class="nav-link">
                                <i class="far nav-icon"></i>
                                <p class="text-light">Data Absen</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="nav-item ">
                    <a href="/siatur/admin/pelanggan/pelanggan.php" class="nav-link">
                        <ion-icon name="people-circle-outline" class="far nav-icon"></ion-icon>
                        <p class="text-light">
                            Pelanggan
                            <i class="right fas"></i>
                        </p>
                    </a>
                </li> -->
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <ion-icon name="code-working-outline" class="far nav-icon"></ion-icon>
                        <p class="text-light">
                            Order Pekerjaan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/siatur/admin/pekerjaan/psb.php" class="nav-link">
                                <i class="far nav-icon"></i>
                                <p class="text-light">Pemasangan Baru</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="/siatur/admin/pekerjaan/perbaikan.php" class="nav-link">
                                <i class="far nav-icon"></i>
                                <p class="text-light">Perbaikan</p>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <ion-icon name="document-text-outline" class="far nav-icon"></ion-icon>
                        <p class="text-light">
                            Laporan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/siatur/admin/laporan/barang.php" class="nav-link">
                                <i class="far nav-icon"></i>
                                <p class="text-light">Laporan Barang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/siatur/admin/laporan/pekerjaan.php" class="nav-link">
                                <i class="far nav-icon"></i>
                                <p class="text-light">Laporan Perkerjaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/siatur/admin/laporan/karyawan.php" class="nav-link">
                                <i class="far nav-icon"></i>
                                <p class="text-light">Laporan Pegawai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/siatur/admin/laporan/absen-karyawan.php" class="nav-link">
                                <i class="far nav-icon"></i>
                                <p class="text-light">Laporan Absen Pegawai</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                        <form action="/siatur/logout.php" method="POST">
                            <button type="submit" class="btn" name="btn_logout">
                                <ion-icon class="far nav-icon" name="log-out-outline"></ion-icon>
                                <p class="text-light">Logout</p>
                            </button>
                        </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>