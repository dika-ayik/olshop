<?php 
include "koneksi.php"; 
if (isset($_POST['input'])) {
	$uploaddir="img/"; //path
    $uploadfile=$uploaddir.basename($_FILES['uploaded_file']['name']);
    //Variabel POST
    $upload=$_FILES['uploaded_file']['name'];
    $nama=$_POST['nama'];
    $deskripsi=$_POST['deskripsi'];
    $harga=$_POST['harga'];
    $genre=$_POST['genre'];

if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $uploadfile)) {
$res=mysqli_query($link , "INSERT INTO barang(id,nama,harga,deskripsi,cover,genre) VALUES
    (NULL,'$nama','$harga','$deskripsi','$uploadfile','$genre')") or die (mysqli_error());
	header("location:home.php");
}else{
	echo "failed";
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/theme-helper.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.css">
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
	<title></title>
</head>
<body>
  <div class="container">
  <?php include "navbar.php"; ?><br><br><br><br>
    <form enctype="multipart/form-data" method="post" action="input.php">
<input type="hidden" name="MAX_FILE_SIZE" value="9000000"/>
  <div class="form-group">
    <label for="nama">Nama Barang</label><br>
    <input class="form-control" type="text" name="nama" placeholder="Nama Barang">
  </div>
  <div class="form-group">
    <label for="deskripsi">Deskripsi</label>
    <textarea class="form-control" placeholder="Deskripsi" name="deskripsi"></textarea>
  </div>
  <div class="form-group">
    <label for="password">Harga</label>
    <input type="text" class="form-control" placeholder="harga" name="harga">
  </div>
  <div class="form-group">
    <label for="fullname">Genre</label>
    <select name="genre" class="form-control">
        <option>Choose Your Book's Genre</option>
    	<option value="Multimedia">Multimedia</option>
    	<option value="Programming">Programming</option>
    	<option value="Bussiness">Bussiness</option>
    	<option value="Cooking">Cooking</option>
    	<option value="House Design">House Design</option>
    	<option value="Sport">Sport</option>
    	<option value="Biography">Biography</option>
      <option value="Novel">Novel</option>
      <option value="Komik">Comic</option>
    </select>
  </div>
  <div class="form-group">
    <label for="fullname">Upload Cover</label><br>
    <img id="preview" src="" alt="" width="200px"/><br><br>
    <input accept="image/*" class="input"  onchange="tampilkanPreview(this,'preview')" type="file" name="uploaded_file">
  </div>
  <button type="submit" name="input" class="btn btn-danger btn-lg btn-block">Input</button>
</form>
  </div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
</body>
</html>