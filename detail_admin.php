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
    <script src="js/showhidepass.js"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
</head>

<body>

    <div id="wrapper">
  <?php include "navbar.php"; ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Admin</h1>
                     <div class="row">
                     <?php
                     include "koneksi.php";
                     $id=$_GET['id'];
                     $sql=mysqli_query($link,"SELECT * FROM admin where id='$id'");
                     $data=mysqli_fetch_array($sql);
                  ?>
                  <div class="col-md-4">
                  <img src="<?php echo $data['cover']; ?>" height="200" width="200" class="img-circle" style="border: 3px solid white;" />
                  </div>
                  <div class="col-md-8">
                  <form method="post" action="detail_admin.php?id=<?php echo $data[0];?>">
                  <table style="font-size: 20px;" class="table table-responsive table-bordered">
                    <tr>
                      <td>Fullname</td>
                      <td><input type="text" name="fullname" class="form-control" value="<?php echo $data['nama']; ?>"></td>
                    </tr>
                    <tr>
                      <td>Username</td>
                      <td><input type="text" value="<?php echo $data['username']; ?>" name="fullname" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>Password</td>
                      <td>
                      <div class="input-group">
                        <input type="Password" id="password" value="<?php echo $data['password']; ?>" name="fullname" class="form-control">
                        <input type="checkbox" id="checkbox"> <font size="3">Show password</font>
                         
                      </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td><textarea name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" ><?php echo $data['alamat']; ?></textarea>
                    </tr>
                    </table>
                      <button name="update" type="submit" class="btn btn-danger btn-block">Save Changes</button>     
                  </form>
                  </div>
                </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            </div>
            <!-- /.row -->
    <script src="js/showhidepass.js"></script>
    <script type="text/javascript">
  $(document).ready(function(){   
    $('#checkbox').click(function(){
      if($(this).is(':checked')){
        $('#password').attr('type','text');
      }else{
        $('#password').attr('type','password');
      }
    });
  });
</script>
    
    <!-- jQuery -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>


</body>

</html>
