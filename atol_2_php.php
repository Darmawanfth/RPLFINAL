<!DOCTYPE html>
<html>
<head>
	<title> ATOL 2 Proses Penjualan</title>
</head>
<body>

<!--- Proses -->
<?php
	//inisialisasi nilai
	
	if (isset($_POST["submit"]))
		{
			$no=0;
			$totalqty=0;
			$totalharga=0;
		for ($i = 0 ; $i<count($_POST('nama'));$i++)
			{
				$nama_barang=$_POST('nama')[$i];
				$harga=$_POST('harga')[$i];
				$qty=$_POST('qty')[$i];
			}
?>
	<table border=1 width="400">
		<tr>
			<th colspan="5" align="center">Penjualan Barang</th>
		</tr>	
		
		<tr>
			<td>No.</td>
			<td>Nama Barang </td>
			<td>Harga </td>
			<td>Quantity </td>
			<td>Subtotal </td>
		</tr>	
<?php			
		} else{
			
			echo "Anda belum klik Submit <br>";
			echo "<a href= 'http://127.0.0.1/10114422/atol_2_kasus.php'> kembali ke form";
		
		}
	
?>

</body>
</html>
