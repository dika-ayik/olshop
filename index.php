<?php
//load the database configuration file
include 'koneksi.php';

if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusMsgClass = 'alert-success';
            $statusMsg = 'Payment data has been inserted successfully.';
            break;
        case 'err':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusMsgClass = '';
            $statusMsg = '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Import CSV File Data into MySQL Database using PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    .panel-heading a{float: right;}
    #importFrm{margin-bottom: 20px;display: none;}
    #importFrm input[type=file] {display: inline;}
  </style>
</head>
<body>

<div class="container">
    <h2>Import CSV File Data Payment</h2>
    <?php if(!empty($statusMsg)){
        echo '<div class="alert '.$statusMsgClass.'">'.$statusMsg.'</div>';
    } ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            Payment list
            <a href="javascript:void(0);" onclick="$('#importFrm').slideToggle();">Import Data Payment</a>
        </div>
        <div class="panel-body">
            <form action="importData.php" method="post" enctype="multipart/form-data" id="importFrm">
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                      <th>Id</th>
                      <th>Tanggal</th>
                      <th>Nama Barang</th>
                      <th>Harga Total</th>
                      <th>Nama Pembeli</th>
                      <th>Email</th>
                      <th>Kode Pos</th>
                      <th>Kota</th>
                      <th>No. Telepon</th>
                      <th>No. Rekening</th>
                      <th>Nama Rekening</th>
                      <th>Bank</th>
                      <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //get rows query
                    $query = $link->query("SELECT * FROM payment ORDER BY id DESC");
                    if($query->num_rows > 0){ 
                        while($row = $query->fetch_assoc()){
                        ?>
                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['tgl']; ?></td>
                      <td><?php echo $row['nama_barang']; ?></td>
                      <td><?php echo $row['hrg_total']; ?></td>
                      <td><?php echo $row['nama_pembeli']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['kode_pos']; ?></td>
                      <td><?php echo $row['kota']; ?></td>
                      <td><?php echo $row['no_telp']; ?></td>
                      <td><?php echo $row['no_rek']; ?></td>
                      <td><?php echo $row['nama_rek']; ?></td>
                      <td><?php echo $row['bank']; ?></td>
                      <td><?php echo $row['alamat']; ?></td>
                      
                    </tr>
                    <?php } }else{ ?>
                    <tr><td colspan="5">No payment(s) found.....</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>