<?php
include "/xampp/htdocs/siatur/library/fpdf.php";;


// Path gambar logo
$logoPath = 'oline.jpg';

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

$pdf = new FPDF();
$pdf->AddPage();

// Masukkan logo dengan ukuran yang sudah disesuaikan
$pdf->Image($logoPath, 10, 10, $newLogoWidth, $newLogoHeight);

// Nama Instansi
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(60); // Geser posisi agar sejajar dengan logo
$pdf->Cell(0, 7, 'INSTANSI XYZ', 0, 1, 'L');

// Nomor Telepon
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(60);
$pdf->Cell(0, 7, 'Telp: (021) 1234-5678', 0, 1, 'L');

// Alamat
$pdf->Cell(60);
$pdf->Cell(0, 7, 'Jl. Contoh No. 123, Jakarta', 0, 1, 'L');

// Garis bawah kop surat
$pdf->Ln(5);
$pdf->Cell(190, 0, '', 'T'); // Garis horizontal
$pdf->Ln(10);

// Judul Laporan
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(190, 10, 'Laporan Karyawan', 0, 1, 'C');
$pdf->Ln(5);

// Header Tabel
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 10, 'ID', 1, 0, 'C');
$pdf->Cell(80, 10, 'Nama', 1, 0, 'C');
$pdf->Cell(80, 10, 'Jabatan', 1, 1, 'C');

// Data Contoh
$data = [
    [1, 'Budi', 'Manager'],
    [2, 'Siti', 'HRD'],
    [3, 'Joko', 'IT Support'],
];

$pdf->SetFont('Arial', '', 12);
foreach ($data as $row) {
    $pdf->Cell(30, 10, $row[0], 1, 0, 'C');
    $pdf->Cell(80, 10, $row[1], 1, 0, 'C');
    $pdf->Cell(80, 10, $row[2], 1, 1, 'C');
}

// Output PDF
$pdf->Output();
?>
?>