<?php
// include database configuration file
include 'dbConfig.php';

// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: home.php");
}

// set customer ID in session
$_SESSION['sessCustomerID'] = 1;

// get customer details by session customer ID
$query = $db->query("SELECT * FROM customers WHERE id = ".$_SESSION['sessCustomerID']);
$custRow = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout - PHP Shopping Cart Tutorial</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{width: 100%;padding: 50px;}
    .shipAddr{width: 30%;float: left;margin-left: 30px;}
    .footBtn{width: 95%;float: left;}
    .orderBtn {float: right;}
    </style>
</head>
<body>
<div class="container">
    <h1>Order Preview</h1>
<div class="row">
<div class="col-md-12">
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo '$'.$item["price"].' USD'; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo '$'.$item["subtotal"].' USD'; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No items in your cart......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' USD'; ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
</div>
</div>
    <br>
    <h1>Fill The Checkout Form</h1>
    <form method="post" action="cartAction.php?action=placeOrder">
    <div class="row">
    <div class="col-md-6">
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
    </div>
    <div class="col-md-6">
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
      </div>
    </div>
    <div class="footBtn">
        <a href="home.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a>
        <button type="submit" class="btn btn-success orderBtn">Place Order <i class="glyphicon glyphicon-menu-right"></i></button>
    </div>
    </form>
</div>
</body>
</html>