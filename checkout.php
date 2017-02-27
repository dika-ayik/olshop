<?php
      include "koneksi.php";
      $tgl=date("Y-m-d");
      $id=$_GET['id'];
      $sql=mysqli_query($link,"SELECT * FROM barang where id='$id'");
      $row=mysqli_fetch_array($sql);
      $rand=rand(143651,134657890);
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout</title>
    <meta name="keywords" content="bootstrap themes, portfolio, responsive theme">
    <meta name="author" content="ThemeForces.Com">
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/theme-helper.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <script type="text/javascript" src="js/modernizr.custom.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
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
  <?php include "navbar_home.php"; ?>
  </div><br><br><br><br>
<div class="container">
 <div class="row">
  <div class="col-md-4 animated bounceInUp" style="border: 1px solid #ff5151;border-radius: 8px;">
  <div class="title"><h3>Form Checkout</h3></div>
<form method="post" action="proses.php">
       <div class="form-group">
       <label>Tanggal Pembelian</label><br>
         <input type="hidden" disabled="" class="form-control" name="tgl" value="<?php echo $tgl; ?>"><?php echo $tgl; ?>
       </div>
       <div class="form-group">
       <label>Id Pembelian</label><br>
         <input type="hidden" disabled="" class="form-control" name="id_pay" value="<?php echo $rand; ?>"><?php echo $rand; ?>
       </div>
       <div class="form-group">
        <label for="nm_usr">Nama</label>
        <input name="nama_pembeli" type="text" class="form-control" id="nm_usr" size="100" />
      </div>
      <div class="form-group">
        <label for="email_usr">Email</label>
        <input name="email" type="text" class="form-control" id="email_usr" size="100"/>
      </div>
      <div class="form-group">
        <label for="almt_usr">Alamat</label>
        <textarea name="alamat" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label for="kp_usr">Kode Pos</label>
        <input name="kode" type="text" class="form-control" maxlength="5" id="kp_usr" size="100"/>
      </div>
      <div class="form-group">
        <label for="kota_usr">Kota</label>
        <input name="kota" type="text" class="form-control" id="kota_usr" size="100"/>
      </div>
      <div class="form-group">
        <label for="tlp">No telepon</label>
        <input name="no_telp" type="text" class="form-control" id="tlp" size="100"/>
      </div>
      <div class="form-group">
        <label for="rek">No Rekening</label>
        <input name="no_rek" type="text" class="form-control " id="rek" size="100" />
      </div>
      <div class="form-group">
        <label for="nmrek">Nama Rekening</label>
        <input name="nama_rek" type="text" class="form-control" id="nmrek" size="100"/>
      </div>
      <div class="form-group">
        <label for="bank">Bank</label>
        <select name="bank" class="form-control">
        <option></option>
        <option value="Mandiri">Mandiri</option>
        <option value="BNI">BNI</option>
        <option value="CIMB">CIMB</option>
        <option value="BCA">BCA</option>
        <option value="Bank Jabar">Bank Jabar</option>
        <option value="Danamon">Danamon</option>
        <option value="BRI">BRI</option>
        <option value="Permata">Permata</option>
        </select>
      </div>
      <div class="form-group">
        <input type="submit" value="Simpan Data" name="finish" class="btn btn-block btn-own"/>
      </div>
    
    </div>
    <div class="col-md-offset-6">
      <h1 class="text-right animated slideInRight">Silahkan Isi Form Checkout Untuk Melakukan Prosedur Transaksi</h1>
      <h3 class="animated slideInRight">Barang yang akan anda pesan :</h3><br>
      <div class="row">
      <div class="col-md-4 animated slideInRight">
      <img src="<?php echo $row['cover']; ?>" class="img-responsive" style="height: 250px;">
      </div>
      <div class="col-md-8 animated slideInRight">
         <p style="font-size: 20px;">Nama Buku :</p><input type="hidden" value="<?php echo $row['nama']; ?>" name="nama"><strong><?php echo $row['nama']; ?></strong><br><br>
         <p style="font-size: 20px;">Genre :</p> <input type="hidden" value="<?php echo $row['genre']; ?>" name=""><strong><?php echo $row['genre']; ?></strong><br><br>
         <p style="font-size: 20px;">Harga Buku :</p> <input type="hidden" value="<?php echo $row['harga']; ?>" name="harga"><strong>Rp.<?php echo $row['harga']; ?>,00</strong><br><br>
         <p style="font-size: 20px;">Deskripsi :</p> <input type="hidden" value="<?php echo $row['deskripsi']; ?>" name=""><strong><?php echo $row['deskripsi']; ?></strong><br><br>
      </div>
      </div>
    </div>
  </div>
</div>
</form>
<br><br>
	</div>
  <?php include "footer.php"; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>