<?php  
require "fpdf/fpdf.php";
//Fields Name position
$pdf= new FPDF('L','cm','Legal'); ;
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Image('img/logo.png',1,1,2,2);                         
$pdf->SetX(3);             
$pdf->MultiCell(19.5,0.5,'Online Bookstore',0,'L');                         
$pdf->SetX(3);             
$pdf->MultiCell(19.5,0.5,'Pemerintah Kota Lumajang',0,'L');                         
$pdf->SetFont('Arial','B',10);             
$pdf->SetX(3);             
$pdf->MultiCell(19.5,0.5,'JL. Bungur No. 130, Telpon : 0411400000',0,'L');
$pdf->SetX(3);             
$pdf->MultiCell(19.5,0.5,'website : www.bookstore.com email : bookstore@hotmail.com',0,'L');
$pdf->Line(1,3.1,34.5,3.1);             
$pdf->SetLineWidth(0.1);             
$pdf->Line(1,3.2,34.5,3.2);                         
$pdf->SetLineWidth(0);
$pdf->Ln();
$pdf->SetFont('times','B',8);
$pdf->Cell(1,1,'No',1,0,'C');
$pdf->Cell(2,1,'Tanggal',1,0,'C');
$pdf->Cell(5,1,'Nama Barang',1,0,'C');
$pdf->Cell(2,1,'Harga Total',1,0,'C');
$pdf->Cell(2.5,1,'Nama Pembeli',1,0,'C');
$pdf->Cell(3,1,'Nomor Rekening',1,0,'C');
$pdf->Cell(2.5,1,'Nama Rekening',1,0,'C');
$pdf->Cell(2,1,'Bank',1,0,'C');
$pdf->Cell(3,1,'Alamat',1,0,'C');
$pdf->Cell(4.5,1);
$pdf->Ln();

    include "koneksi.php";
    $no=1;
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
        $pdf->Cell(1,1,$id,1,0,'C');
        $pdf->Cell(2,1,$tgl,1,0,'C');
        $pdf->Cell(5,1,$nama,1,0,'C');
        $pdf->Cell(2,1,$hrg,1,0,'C');
        $pdf->Cell(2.5,1,$nama_pembeli,1,0,'C');
        $pdf->Cell(3,1,$no_rek,1,0,'C');
        $pdf->Cell(2.5,1,$nama_rek,1,0,'C');
        $pdf->Cell(2,1,$bank,1,0,'C');
        $pdf->Cell(3,1,$alamat,1,0,'C');
        $pdf->Ln();
    }
    $pdf->Output();
?>