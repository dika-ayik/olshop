<?php
session_start();
if (empty($_SESSION['user'])) {
    header("location:login.php");
}else{
    include "koneksi.php";
}
if (isset($_POST['export'])) {
    header("location:export.php");
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

    <title>Data Payment</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">
        <?php include "navbar.php"; ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Payment</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Data Payment</h4>
                          </div>
                        <div class="panel-body">
                        <div class="row">
                       <?php
                         include "paging_pay.php";
                       ?>
                <div class="col-md-6">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari Berdasarkan ID , Nomor Rekening , atau Tahun .." name="q" value="<?php echo $q ?>">
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
                <div class="col-md-6">
                <form action="pembeli.php" method="post">
                 <button type="submit" name="export" class="btn btn-danger">Export Data</button>
                </form>
                </div>
                </div><br>
                            <table width="100%" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Harga Total</th>
                                        <th class="text-center">Nama Pembeli</th>
                                        <th class="text-center">No. Rekening</th>
                                        <th class="text-center">Nama Rekening</th>
                                        <th class="text-center">Bank</th>
                                        <th class="text-center">Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no=1 ;
                            while (($count < $rpp) && ($i < $tcount)) {
                                mysqli_data_seek($result, $i);
                                $data = mysqli_fetch_array($result);
                            ?>
                                    <tr>
                                      <td align="center"><?php echo $data['id_pay'];  ?></td>
                                      <td align="center"><?php echo $data['tgl'];  ?></td>
                                      <td align="center"><?php echo $data['nama_barang'];  ?></td>
                                      <td align="center"><?php echo $data['hrg_total'];  ?></td>
                                      <td align="center"><?php echo $data['nama_pembeli'];  ?></td>
                                      <td align="center"><?php echo $data['no_rek'];  ?></td>
                                      <td align="center"><?php echo $data['nama_rek'];  ?></td>
                                      <td align="center"><?php echo $data['bank'];  ?></td>
                                      <td align="center"><?php echo $data['alamat'];  ?></td>
                                    </tr>
                            <?php
                              $i++;
                              $count++; 
                              } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="row">
                               <div class="col-md-12">
                    <?php echo paginate_three($reload, $page, $tpages, $adjacents); ?>
                               </div>
                           </div>
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
