<?php
if (isset($_POST['login'])) {
include "koneksi.php";
$user=$_POST['user'];
$pass=$_POST['password'];
$sql=mysqli_query($link,"SELECT * FROM admin where username='$user' and password='$pass'");
if ($sql) {
	session_start();
	$data=mysqli_fetch_array($sql);
	$_SESSION['user']=$data['username'];
	$_SESSION['password']=$data['password'];
	$_SESSION['nama']=$data['nama'];
	$_SESSION['cover']=$data['cover'];
	$_SESSION['alamat']=$data['alamat'];
	header("location:admin.php");
}else{
	echo "Gagal";

}
}
?>