<?php
    require "fpdf184/fpdf.php";
    include "koneksi.php";
    // instansiasi object FPDF dan mengatur orientasi kertas dan ukuran kertas
    $pdf = new FPDF('l', 'mm', 'A4');
    // membuat halaman baru
    $pdf->AddPage();

    // set start header
    // set font
    $pdf->SetFont('Arial', 'B', 16);
    // set lebar, tinggi, string, line break dan align
    $pdf->Cell(190, 7, 'PROGRAM STUDI TEKNIK INFORMATIKA', 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(190,7, 'DAFTAR MAHASISWA MATKUL PEMROGRAMAN WEB DINAMIS', 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 6, 'NIM', 1,0);
    $pdf->Cell(50, 6, 'NAMA MAHASISWA', 1,0);
    $pdf->Cell(25, 6, 'J KEL', 1,0);
    $pdf->Cell(50, 6, 'ALAMAT', 1,0);
    $pdf->Cell(30, 6, 'TANGGAL LAHIR', 1, 1);
    $pdf->SetFont('Arial', '', 10);
    // set end header

    // query data mahasiswa
    $mahasiswa = mysqli_query($con, "SELECT * FROM mahasiswa");
    // loop data
    while($row = mysqli_fetch_array($mahasiswa)){
        // mencetak data mahasiswa ke dalam pdf
        $pdf->Cell(20, 6, $row['nim'], 1, 0);
        $pdf->Cell(50, 6, $row['Nama'], 1, 0);
        $pdf->Cell(25, 6, $row['jkel'], 1, 0);
        $pdf->Cell(50, 6, $row['alamat'], 1, 0);
        $pdf->Cell(30, 6, $row['tgllhr'], 1, 1);
    }
    $pdf->Output();