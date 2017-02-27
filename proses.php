<?php
include "koneksi.php";
$pay      = $_POST['id_pay'];
$tgl      = $_POST['tgl'];
$namabrg  = $_POST['nama'];
$hargabrg = $_POST['harga'];
$nama     = $_POST['nama_pembeli'];
$email = $_POST['email'];
$kode = $_POST['kode'];
$kota = $_POST['kota'];
$no_telp = $_POST['no_telp'];
$no_rek = $_POST['no_rek'];
$nama_rek = $_POST['nama_rek'];
$bank = $_POST['bank'];
$alamat = $_POST['alamat'];

$sql=mysqli_query($link,"INSERT INTO payment (id,id_pay,tgl,nama_barang,hrg_total,nama_pembeli,email,kode_pos,kota,no_telp,no_rek,nama_rek,bank,alamat) VALUES 
(NULL, '$pay' ,'$tgl', '$namabrg' , '$hargabrg' , '$nama' , '$email' , '$kode' , '$kota' , '$no_telp' , '$no_rek' , '$nama_rek' , '$bank', '$alamat' )");
if ($sql) {
    header("location:selesai.php");
}else{
	echo "gagal";
}
?>