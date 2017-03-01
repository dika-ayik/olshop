<?php
include "koneksi.php";
if (isset($_POST['update'])) {
    $id=$_GET['id'];
    $nama=$_POST['nama'];
    $harga=$_POST['harga'];
    $deskripsi=$_POST['deskripsi'];
    $sql=mysqli_query($link,"UPDATE barang SET nama='$nama' , harga = '$harga' , deskripsi = '$deskripsi' where id ='$id' ");
    if ($sql) {
        header("location:tables.php");
    }else{
        //echo "Gagal";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Shop</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "navbar.php"; ?>
        <div id="page-wrapper">
            <div class="row">
            <?php
                     include "koneksi.php";
                     $id=$_GET['id'];
                     $sql=mysqli_query($link,"SELECT * FROM barang where id='$id'");
                     $data=mysqli_fetch_array($sql);
                  ?>
                <div class="col-lg-12">
                    <h1 class="page-header">Detail Barang</h1>
                    <div class="col-md-4">
                  <img src="<?php echo $data['cover']; ?>" class="img-responsive">
                  </div>
                     <div class="col-md-8">
                  <form method="post" action="detail_barang.php?id=<?php echo $data[0];?>">
                  <table style="font-size: 25px;" class="table table-responsive table-bordered">
                    <tr>
                      <td>Nama</td>
                      <td><input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>"></td>
                    </tr>
                    <tr>
                      <td>Harga</td>
                      <td><input type="text" name="harga" class="form-control" value="<?php echo $data['harga']; ?>"></td>
                    </tr>
                    <tr>
                      <td>Deskripsi</td>
                      <td><textarea class="form-control" name="deskripsi" value="<?php echo $data['deskripsi']; ?>"><?php echo $data['deskripsi']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Genre</td>
                        <td>
                            <p><?php echo $data['genre']; ?></p>
                        </td>
                    </tr>
                    <tr>
                      <td colspan="2"><button type="submit" name="update" class="btn btn-danger btn-block">Save Changes</button></td>
                    </tr>
                  </table>
                  </form>
                  <a href="tables.php">Kembali</a>
                  </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            </div>
            <!-- /.row -->
    <!-- jQuery -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
