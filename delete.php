<?php
$con=mysqli_connect("localhost","root","","kasir");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$id=$_GET['id'];
$sql = mysqli_query($con,"DELETE FROM barang where id='$id'");
if ($sql) {
	echo "<script>alert('Hapus Berhasil!');window.location='tables.php'</script>";
}else{
    echo "<script>alert('Hapus Gagal!');window.location='tables.php'</script>";
}
mysqli_close($con);
?>