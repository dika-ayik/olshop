<?php

// Fungsi header dengan mengirimkan raw data excel
    header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
    header("Content-Disposition: attachment; filename=tutorialweb-export.xls");

?>
<html>
<body>
<table border="1">
	<tr>
	    <th align="center">No</th>
		<th align="center">Id</th>
        <th align="center">Tanggal</th>
        <th align="center">Nama Barang</th>
        <th align="center">Harga Total</th>
        <th align="center">Nama Pembeli</th>
        <th align="center">No. Rekening</th>
        <th align="center">Nama Rekening</th>
        <th align="center">Bank</th>
        <th align="center">Alamat</th>
	</tr>
	<?php
	//koneksi ke database
	include "koneksi.php";
	
	//query menampilkan data
	$sql = mysqli_query($link,"SELECT * FROM payment ORDER BY id ASC");
	$no = 1;
	while($data = mysqli_fetch_assoc($sql)){
		echo '
		<tr>
			<td align="center">'.$no.'</td>
			<td align="center">'.$data['id_pay'].'</td>
            <td align="center">'.$data['tgl'].'</td>
            <td align="center">'.$data['nama_barang'].'</td>
            <td align="center">Rp.'.$data['hrg_total'].',00</td>
            <td align="center">'.$data['nama_pembeli'].'</td>
            <td align="center">'.$data['no_rek'].'</td>
            <td align="center">'.$data['nama_rek'].'</td>
            <td align="center">'.$data['bank'].'</td>
            <td align="center">'.$data['alamat'].'</td>
		</tr>
		';
		$no++;
	}
	?>
</table>
</body>
</html>