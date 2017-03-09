<?php
// initialize shopping cart class
include 'Cart.php';
$cart = new Cart;

// include database configuration file
include 'dbConfig.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        // get product details
        $query = $db->query("SELECT * FROM barang WHERE id = ".$productID);
        $row = mysqli_fetch_assoc($query);
        $itemData = array(
            'id' => $row['id'],
            'name' => $row['nama'],
            'price' => $row['harga'],
            'qty' => 1
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'viewCart.php':'home.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: viewCart.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){
        // insert order details into database
        $nama     = $_POST['nama_pembeli'];
        $email = $_POST['email'];
        $kode = $_POST['kode'];
        $kota = $_POST['kota'];
        $no_telp = $_POST['no_telp'];
        $no_rek = $_POST['no_rek'];
        $nama_rek = $_POST['nama_rek'];
        $bank = $_POST['bank'];
        $alamat = $_POST['alamat'];

        $insertOrder = $db->query("INSERT INTO payment (id, tgl , hrg_total,nama_pembeli,email,kode_pos,kota,no_telp,no_rek,nama_rek,bank,alamat) VALUES (NULL,'".date("Y-m-d H:i:s")."', '".$cart->total()."', '$nama' , '$email' , '$kode' , '$kota' , '$no_telp' , '$no_rek' , '$nama_rek' , '$bank', '$alamat')");
        if($insertOrder){
            $orderID = $db->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";
            }
            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);
            
            if($insertOrderItems){
                $cart->destroy();
                header("Location: selesai.php");
            }else{
                header("Location: checkout.php");
            }
        }else{
            header("Location: checkout.php");
        }
    }else{
        header("Location: home.php");
    }
}else{
    header("Location: home.php");
}