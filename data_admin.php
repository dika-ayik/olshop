<?php 
include "koneksi.php"; 
if (isset($_POST['input'])) {
	$uploaddir="img_admin/"; //path
    $uploadfile=$uploaddir.basename($_FILES['uploaded_file']['name']);
    //Variabel POST
    $upload=$_FILES['uploaded_file']['name'];
    $user=$_POST['user'];
    $nama=$_POST['nama'];
    $password=$_POST['password'];
    $alamat=$_POST['alamat'];

if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $uploadfile)) {
$res=mysqli_query($link , "INSERT INTO admin(id,nama,username,password,cover,alamat) VALUES
    (NULL,'$nama','$user','$password','$uploadfile','$alamat')") or die (mysqli_error());
	header("location:data_admin.php");
}else{
	echo "failed";
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

    <title>Data Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <script>
            function tampilkanPreview(gambar,idpreview){
                var gb = gambar.files;
                for (var i = 0; i < gb.length; i++){
                    var gbPreview = gb[i];
                    var imageType = /image.*/;
                    var preview=document.getElementById(idpreview);            
                    var reader = new FileReader();
                    
                    if (gbPreview.type.match(imageType)) {
                        preview.file = gbPreview;
                        reader.onload = (function(element) { 
                            return function(e) { 
                                element.src = e.target.result; 
                            }; 
                        })(preview);
                        reader.readAsDataURL(gbPreview);
                    }else{
                        alert("file yang anda upload tidak sesuai. Khusus mengunakan image.");
                    }
                   
                }    
            }
        </script>
</head>

<body>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Input Admin</h4>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" method="post" action="data_admin.php">
<input type="hidden" name="MAX_FILE_SIZE" value="9000000"/>
  <div class="form-group">
    <label for="nama">Username</label><br>
    <input class="form-control" type="text" name="user" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="text" class="form-control" placeholder="password" name="password">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label><br>
    <input class="form-control" type="text" name="nama" placeholder="Nama">
  </div>
  <div class="form-group">
    <label>Alamat</label>
    <textarea class="form-control" name="alamat"></textarea>
  </div>
  <div class="form-group">
    <label for="fullname">Upload Foto</label><br>
    <img id="preview" src="" alt="" width="200px"/><br><br>
    <input accept="image/*" class="input"  onchange="tampilkanPreview(this,'preview')" type="file" name="uploaded_file">
  </div>
  <button type="submit" name="input" class="btn btn-default btn-block">Input</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <div id="wrapper">
        <?php include "navbar.php"; ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Admin</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <div class="row">
                            <div class="col-md-9">
                            <h4>Data Admin</h4>
                            </div>
                            <div class="col-md-3 ">
                              <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i></button>
                            </div>
                          </div>
                        </div>
                        <div class="panel-body">
                        <div class="row">
                           <?php
                             include "paging_admin.php";
                           ?>
                        <div class="col-md-6">
                           <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                              <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari Berdasarkan Nama" name="q" value="<?php echo $q ?>">
                            <span class="input-group-btn">
                                <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a class="btn btn-default" href="<?php echo $_SERVER['PHP_SELF'] ?>">Reset</a>
                                    <?php
                                }
                                ?>
                                <button class="btn btn-default" type="submit">Go!</button>
                            </span>
                        </div>
                           </form>
                        </div>
                        </div><br>
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no=1 ;
                                $a= $no ++;
                            while (($count < $rpp) && ($i < $tcount)) {
                                mysqli_data_seek($result, $i);
                                $data = mysqli_fetch_array($result);
                            ?>
                                    <tr>
                                        <td align="center"><?php echo $a; ?></td>
                                        <td align="center"><?php echo $data['nama']; ?></td>
                                        <td align="center"><?php echo $data['alamat']; ?></td>
                                        <td align="center">
                                            <a href="" class="btn btn-lg btn-default" onclick="return confirm ('Hapus'?');"title="Hapus">
                                            <i class="glyphicon glyphicon-trash"></i>
                                            </a> 
                                            <a href="detail_admin.php" class="btn btn-lg btn-default">
                                            <i class="glyphicon glyphicon-zoom-in"></i>
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                              $i++;
                              $count++; 
                              } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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
