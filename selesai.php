<!DOCTYPE html>
<html>
<head>
	<title>Terima Kasih</title>
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
    <style type="text/css">
      .jumbotron{background-color: white;border: 3px solid #ff5151;border-radius: 5px;}
    </style>
</head>
<body>
<div class="container-fluid">
   <?php include "navbar_home.php"; ?>
</div><br><br><br><br><br><br><br><br>
    <div class="container">
         <div class="jumbotron animated slideInRight">
           <h1 class="animated fadeInUp">Terima kasih Anda sudah berbelanja di Toko Kami</h1>
           <a href="home.php">Kembali ke halaman utama</a>
         </div>
    </div><br><br><br><br><br><br><br>
    <?php include "footer.php"; ?>
</body>
</html>