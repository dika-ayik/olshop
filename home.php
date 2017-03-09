<?php
// include database configuration file
include 'dbConfig.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/theme-helper.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.css">
	<script src="js/jquery-3.1.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <?php include "navbar_home.php"; ?><br><br><br>
     <div class="row">
     <div class="col-md-12 animated zoomIn">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
    <a href="">
      <img src="img/banner.png" class="img-responsive" style="height: 250px;width: 1400px;" alt="...">
    </a>
    </div>
    <div class="item">
    <a href="">
      <img src="img/banner 2.png" class="img-responsive" style="height: 250px;width: 1400px;" alt="...">
    </a>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div><br>
<div class="row">
     <div class="col-md-3 animated bounceInUp ">
     <a href="">
       <img src="iklan.jpg" class="img-responsive" style="height: 500px;">
     </a>
     </div>
      <div class="col-md-9 animated bounceInUp">
       <div class="alert alert-danger" style="color: white;background-color: #F24968">
        <h3>Products :</h3>
       </div>
       <div class="row">
       <?php
         include "paging.php";
       ?>
                <div class="col-md-6">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                        <div class="input-group">
                          <select class="form-control" name="q">
                            <option value="<?php echo $q ?>">======= Cari Berdasarkan Kategori =======</option>
                            <option value="Multimedia">Multimedia</option>
                            <option value="Programming">Programming</option>
                            <option value="Bussiness">Bussiness</option>
                            <option value="Cooking">Cooking</option>
                            <option value="House Design">House Design</option>
                            <option value="Sport">Sport</option>
                            <option value="Biography">Biography</option>
                            <option value="Komik">Comic</option>
                          </select>
                            <span class="input-group-btn">
                                <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a class="btn btn-default" href="<?php echo $_SERVER['PHP_SELF'] ?>">Reset</a>
                                    <?php
                                }
                                ?>
                                <button class="btn btn-own" style="border:1px solid #F24150;" type="submit">Go!</button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari Berdasarkan Category dan Judul ..." name="q" value="<?php echo $q ?>">
                            <span class="input-group-btn">
                                <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a class="btn btn-default" href="<?php echo $_SERVER['PHP_SELF'] ?>">Reset</a>
                                    <?php
                                }
                                ?>
                                <button class="btn btn-own" style="border:1px solid #F24150;" type="submit">Go!</button>
                            </span>
                        </div>
                    </form>
                </div>
        </div><br><br>
        <div class="row">
        <?php
                            while (($count < $rpp) && ($i < $tcount)) {
                                mysqli_data_seek($result, $i);
                                $data = mysqli_fetch_array($result);
          ?>
          <div class="col-md-2">
        <center>
          <div class="thumbnail">
          <img src="<?php echo $data['cover']; ?>" class="img-responsive" style="height: 150px;"><br>
          <a href="cartAction.php?action=addToCart&id=<?php echo $data["id"]; ?>" class="btn btn-own">Add To Cart</a>
          </div>
        </center>
          </div>
          <?php
          $i++;
          $count++; 
          } ?>
        </div><br>
        <div class="row">
                <div class="col-md-12">
                    <!--silahkan di komen atau di hapus saja baris yang tidak ingin digunakan-->
                    <?php echo paginate_three($reload, $page, $tpages, $adjacents); ?>
                </div>
            </div>
       </div>
      </div>
</div><br>
<?php include "footer.php"; ?>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
</body>
</html>