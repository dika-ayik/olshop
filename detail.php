<?php 
include "koneksi.php"; 
$id=$_GET['id'];
$sql=mysqli_query($link,"SELECT * FROM barang where id = '$id'");
$row=mysqli_fetch_array($sql);
?>
<html style="height: 100%;">
<head>
	<title></title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/theme-helper.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.css">
	<script src="js/jquery-3.1.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<script>
        $(document).ready(function(){
           $(".dropdown").hover(            
           function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
           },
           function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
           }
          );
        });
    </script>
</head>
<body>
   <div class="container-fluid">
    <?php include "navbar.php"; ?>
   </div><br><br><br><br><br>
   <div class="container" style="width: 650px;">
     <div class="panel panel-danger animated bounceInUp">
       <div class="panel-heading"><h1>Detail Produk</h1></div>
       <div class="panel-body">
          <div class="row">
             <div class="col-md-6">
             <center>
               <img src="<?php echo $row['cover']; ?>" class="img-responsive" style="height: 250px;">
             </center>
             </div>
             <div class="col-md-6">
               <table class="table table-striped table-bordered" style="font-size: 15px;">
               	<tr>
               		<td>Nama Produk</td>
               		<td><?php echo $row['nama']; ?></td>
               	</tr>
               	<tr>
               		<td>Genre</td>
               		<td><?php echo $row['genre']; ?></td>
               	</tr>
               	<tr>
               		<td>Deskripsi Produk</td>
               		<td><?php echo $row['deskripsi']; ?></td>
               	</tr>
               	<tr>
               		<td>Harga</td>
               		<td>Rp.<?php echo $row['harga']; ?>,00</td>
               	</tr>
               </table>
             </div>
          </div><br>
          <div class="row">
          <div class="col-md-6">
          <a href="home.php" class="btn btn-block btn-back">Kembali</a>
          </div>
          <div class="col-md-6">
          <a href="checkout.php?id=<?php echo $row['id']; ?>" class="btn btn-block btn-own">Order Sekarang !</a>
          </div>
          </div>
       </div>
     </div>
   </div>
<br><br><br><br>
<?php include "footer.php"; ?>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery-3.1.1.min.js"></script>
</body>
</html>