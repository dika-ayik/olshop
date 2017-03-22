<?php

$pay=mysqli_query($link,"SELECT * FROM payment");
    $numb=mysqli_num_rows($pay);

    $buku=mysqli_query($link,"SELECT * FROM barang");
    $num=mysqli_num_rows($buku);

    $programmer=mysqli_query($link,"SELECT * FROM barang WHERE genre = 'Programming'");
    $hitung_1=mysqli_num_rows($programmer);

    $multi=mysqli_query($link,"SELECT * FROM barang WHERE genre = 'Multimedia'");
    $hitung_2=mysqli_num_rows($multi);

    $buss=mysqli_query($link,"SELECT * FROM barang WHERE genre = 'Bussiness'");
    $hitung_3=mysqli_num_rows($buss);

    $cook=mysqli_query($link,"SELECT * FROM barang WHERE genre = 'Cooking'");
    $hitung_4=mysqli_num_rows($cook);

    $house=mysqli_query($link,"SELECT * FROM barang WHERE genre = 'House Design'");
    $hitung_5=mysqli_num_rows($house);

    $sport=mysqli_query($link,"SELECT * FROM barang WHERE genre = 'Sport'");
    $hitung_6=mysqli_num_rows($sport);

    $bio=mysqli_query($link,"SELECT * FROM barang WHERE genre = 'Biography'");
    $hitung_7=mysqli_num_rows($bio);

    $novel=mysqli_query($link,"SELECT * FROM barang WHERE genre = 'Novel'");
    $hitung_8=mysqli_num_rows($novel);

    $comic=mysqli_query($link,"SELECT * FROM barang WHERE genre = 'Comic'");
    $hitung_9=mysqli_num_rows($comic);

?>