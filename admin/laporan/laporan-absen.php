<?php
include "/xampp/htdocs/siatur/services/koneksi.php";

// Tahun yang ingin ditampilkan
$tahun = 2024;

// Query untuk mendapatkan laporan absensi per bulan dalam tahun tertentu
$query = "
    SELECT 
        k.id,
        k.nama_karyawan,
        MONTH(a.tanggal) AS bulan,
        COUNT(a.id) AS jumlah_absen
    FROM karyawan k
    LEFT JOIN absensi a ON k.id = a.id
    WHERE YEAR(a.tanggal_absen) = $tahun
    GROUP BY k.id, MONTH(a.tanggal)
    ORDER BY k.id, bulan
";

$result = $conn->query($query);

if (isset($_POST{'cetak'})) {
include "/xampp/htdocs/siatur/library/fpdf.php";;

// Path gambar logo
$logoPath = 'netsun.jpg';

// Ambil ukuran asli gambar
list($logoWidth, $logoHeight) = getimagesize($logoPath);

// Tentukan batas ukuran kop surat
$maxLogoHeight = 25;  // Tinggi maksimum
$maxLogoWidth = 50;   // Lebar maksimum agar tidak terlalu kecil atau besar

// Skala berdasarkan tinggi
$scaleHeight = $maxLogoHeight / $logoHeight;
$scaleWidth = $maxLogoWidth / $logoWidth;
$scale = min($scaleHeight, $scaleWidth); // Pilih skala terkecil agar sesuai batas

// Hitung ukuran baru
$newLogoWidth = $logoWidth * $scale;
$newLogoHeight = $logoHeight * $scale;

$pdf = new FPDF('P', 'mm', 'A4'); // Orientasi Landscape
$pdf->AddPage();

$pdf->Image($logoPath, 10, 10, $newLogoWidth, $newLogoHeight);

// Nama Instansi
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(60); // Geser posisi agar sejajar dengan logo
$pdf->Cell(0, 7, 'PT. Net Sun Power (NSP)', 0, 1, 'L');

// Nomor Telepon
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(60);
$pdf->Cell(0, 7, 'Telp: 085654807560', 0, 1, 'L');

// Alamat
$pdf->Cell(60);
$pdf->Cell(0, 7, 'Jl. Handil Bakti, Semangat Dalam Komp Mitra Bakti Jalur 1 Blok D no 24', 0, 1, 'L');

// Garis bawah kop surat
$pdf->Ln(5);
$pdf->Cell(275, 0, '', 'B', 1, 'C');
$pdf->Ln(5);

// Judul Laporan
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(190, 10, 'Laporan Data Karyawan', 0, 1, 'C');

// Periode Tanggal
$startDate = '01-01-2024';
$endDate = '31-01-2024';
$pdf->SetFont('Arial', 'I', 12);
$pdf->Cell(190, 7, "Periode: $startDate s.d. $endDate", 0, 1, 'C');

$pdf->Ln(5);

// **Atur Lebar Kolom (Total = 190mm)**
$widths = [20, 50, 40, 40, 40]; // Lebar masing-masing kolom

// **Header Tabel**
$pdf->SetFont('Arial', 'B', 10);
$header = ['ID', 'NIP Karyawan', 'Nama Karyawan', 'Jabatan', 'Total Absen'];

foreach ($header as $i => $col) {
    $pdf->Cell($widths[$i], 10, $col, 1, 0, 'C');
}
$pdf->Ln();

// **Data Contoh (Bisa diganti dengan data dari database)**
$data = [
    [1, 'Budi Santoso', 'Manager', 'HRD', '10,000,000'],
    [2, 'Siti Aminah', 'Staff', 'Keuangan', '7,500,000'],
    [3, 'Joko Susanto', 'IT Support', 'IT', '6,000,000'],
    [4, 'Rina Dewi', 'Marketing', 'Pemasaran', '8,500,000'],
    [5, 'Andi Saputra', 'Supervisor', 'Produksi', '9,000,000']
];

$pdf->SetFont('Arial', '', 10);
foreach ($data as $row) {
    foreach ($row as $i => $col) {
        $pdf->Cell($widths[$i], 10, $col, 1, 0, 'C');
    }
    $pdf->Ln();
}

// **Spasi setelah tabel**
$pdf->Ln(15);

// **Posisi Tanda Tangan di Kanan Bawah**
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(120);
$pdf->Cell(70, 7, 'Jakarta, ' . date('d-m-Y'), 0, 1, 'C'); // Tanggal otomatis
$pdf->Ln(20);

$pdf->Cell(120);
$pdf->Cell(70, 7, '______________________', 0, 1, 'C');
$pdf->Cell(120);
$pdf->Cell(70, 7, 'Nama Pejabat', 0, 1, 'C');
$pdf->Cell(120);
$pdf->Cell(70, 7, 'Jabatan Pejabat', 0, 1, 'C');

// **Output PDF**
$pdf->Output();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemasangan Baru</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/siatur/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/siatur/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/siatur/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/siatur/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="/siatur/dist/css/adminlte.min.css">
    <link rel="icon" href="/siatur/storage/nsp.jpg">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php include "/xampp/htdocs/siatur/layouts/header.php"?>
        <?php include "/xampp/htdocs/siatur/layouts/sidebar.php"?>

        <!-- Main Content -->
        <div class="content-wrapper bg-gradient-white">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Pemasangan Baru</h1>
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
                                    <div class="card-header">
                                        <form action="" method="POST">
                                            <div class="card-title">
                                                <button name="cetak" class="btn btn-sm btn-success ">Tambah
                                                    Data</button>
                                            </div>
                                        </form>

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
                                        <table id="example1" class="table table-bordered text-center">
                                            <thead class="bg-gradient-cyan">
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIP Karyawan</th>
                                                    <th>Nama Karyawan</th>
                                                    <th>Jabatan</th>
                                                    <th>Jumlah Absen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($result_tampil as $psb) {?>
                                                <tr>
                                                    <td><?= $psb['nama_pelanggan']?></td>
                                                    <td><?= $psb['wa_pelanggan']?></td>
                                                    <td><?= $psb['alamat_pelanggan']?></td>
                                                    <td><img src="/siatur/storage/img/<?= $psb['rumah_pelanggan']?>"
                                                            alt="<?= $psb['rumah_pelanggan']?>" style="width: 100px;">
                                                    </td>
                                                    <td><img src="/siatur/storage/img/<?= $psb['ktp_pelanggan']?>"
                                                            alt="<?= $psb['ktp_pelanggan']?>" style="width: 100px;">
                                                    </td>
                                                    <td><?= $psb['paket_internet']?></td>
                                                    <td>
                                                        <a class="btn btn-info btn-sm"
                                                            href="edit-psb.php?id=<?= $psb['id']?>">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-sm"
                                                            href="hapus-psb.php?id=<?= $psb['id']?>">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Delete
                                                        </a>

                                                        <form action="psb.php" method="POST">
                                                            <input type="hidden" name="id_pekerjaan"
                                                                value="<?= $psb['id'] ?>">
                                                            <select name="id_karyawan">
                                                                <?php foreach ($result_tampilkaryawan as $karyawan) { ?>
                                                                <option value="<?= $karyawan['id'] ?>">
                                                                    <?= $karyawan['nama_karyawan'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <button type="submit" name="btn_kirim"
                                                                class="btn btn-warning">Kirim</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php }?>
                                            </tbody>
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

        <?php include "/xampp/htdocs/siatur/layouts/footer.php"?>
    </div>

    <script src="/siatur/plugins/jquery/jquery.min.js"></script>
    <script src="/siatur/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/siatur/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/siatur/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/siatur/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/siatur/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/siatur/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/siatur/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/siatur/plugins/jszip/jszip.min.js"></script>
    <script src="/siatur/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/siatur/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/siatur/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/siatur/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/siatur/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="/siatur/dist/js/adminlte.min.js"></script>
    <script src="/siatur/dist/js/demo.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>