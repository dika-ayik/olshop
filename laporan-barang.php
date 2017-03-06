<?php  
require "fpdf/fpdf.php";
//Fields Name position
$pdf= new FPDF('L','mm',array(297,210)); ;
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('times','B',8);
$pdf->Cell(10,7,'No',1,0,'C');
$pdf->Cell(20,7,'Tanggal',1,0,'C');
$pdf->Cell(50,7,'Nama Barang',1,0,'C');
$pdf->Cell(20,7,'Harga Total',1,0,'C');
$pdf->Cell(25,7,'Nama Pembeli',1,0,'C');
$pdf->Cell(30,7,'Nomor Rekening',1,0,'C');
$pdf->Cell(25,7,'Nama Rekening',1,0,'C');
$pdf->Cell(20,7,'Bank',1,0,'C');
$pdf->Cell(30,7,'Alamat',1,0,'C');
$pdf->Cell(450,7);
$pdf->Ln();

    include "koneksi.php";
    $no=0;
    $result=mysqli_query($link, "SELECT * FROM payment");
    while ($row=mysqli_fetch_array($result)) {
        $id=$no++;
        $tgl=$row['tgl'];
        $nama=$row['nama_barang'];
        $hrg=$row['hrg_total'];
        $nama_pembeli=$row['nama_pembeli'];
        $no_rek=$row['no_rek'];
        $nama_rek=$row['nama_rek'];
        $bank=$row['bank'];
        $alamat=$row['alamat'];
        $pdf->Cell(10,7,$id,1,0,'C');
        $pdf->Cell(20,7,$tgl,1,0,'C');
        $pdf->Cell(50,7,$nama,1,0,'C');
        $pdf->Cell(20,7,$hrg,1,0,'C');
        $pdf->Cell(25,7,$nama_pembeli,1,0,'C');
        $pdf->Cell(30,7,$no_rek,1,0,'C');
        $pdf->Cell(25,7,$nama_rek,1,0,'C');
        $pdf->Cell(20,7,$bank,1,0,'C');
        $pdf->Cell(30,7,$alamat,1,0,'C');
        $pdf->Ln();
    }
    $pdf->Output();
?>