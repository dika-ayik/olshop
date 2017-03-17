<?php
//load the database configuration file
include 'koneksi.php';

if(isset($_POST['importSubmit'])){
    
    //validate whether uploaded file is a csv file
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            //skip first line
            fgetcsv($csvFile);
            
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                //check whether member already exists in database with same email
                $prevQuery = "SELECT id FROM payment WHERE email = '".$line[5]."'";
                $prevResult = $link->query($prevQuery);
                if($prevResult->num_rows > 0){
                    //update member data
                    $link->query("UPDATE payment SET id = '".$line[0]."', tgl = '".$line[1]."', nama_barang = '".$line[2]."', hrg_total = '".$line[3]."', nama_pembeli = '".$line[4]."', kode_pos = '".$line[6]."',kota = '".$line[7]."',no_telp = '".$line[8]."',no_rek = '".$line[9]."', nama_rek = '".$line[10]."',bank = '".$line[11]."', alamat = '".$line[12]."' WHERE email = '".$line[5]."'");
                }else{
                    //insert member data into database
                    $link->query("INSERT INTO payment (id, tgl, nama_barang, hrg_total, nama_pembeli, email, kode_pos, kota, no_telp, no_rek, nama_rek, bank, alamat) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."', '".$line[6]."','".$line[7]."','".$line[8]."',".$line[9]."',".$line[10]."',".$line[11]."',".$line[12]."')");
                }
            }
            
            //close opened csv file
            fclose($csvFile);

            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

//redirect to the listing page
header("Location: index.php".$qstring);