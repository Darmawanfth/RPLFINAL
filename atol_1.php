<!DOCTYPE html>
<html>
<head>
	<title> ATOL 1 </title>
</head>
<body>
	<form action="" method="post" name="frm_penjualan" target="_self">
		<table width="30%" align="center"> 
		<tr><th colspan="2"><h2>Penjualan</h2></th></tr>
		<tr>
			<td>Nama Barang </td>
			<td><input type="text" name="txt_nama_barang"> </input> </td>
		</tr>
		<tr>

			<td>Harga </td>
			<td><input type="text" name="txt_harga"></input></td>
		</tr>

		<tr>
			<td>Quantity </td>
			<td><input type="number" name="num_quantity" min="0" max="100" step="1" value="0"></input>
			</td>
		</tr>
		<tr>
			<td>Status </td>
			<td><input type="radio" name="rdo_status" value="pelanggan">Pelanggan </input>
				<input type="radio" name="rdo_status" value="bukan_pelanggan">Bukan Pelanggan </input>
			</td>

		</tr>
		<tr>
			<td>Kota </td>
			<td><select name="slc_kota">
				<option name="slc_kota" value="bandung">Bandung </option>
				<option name="slc_kota" value="surabaya">Surabaya </option>
				<option name="slc_kota" value="jakarta">Jakarta </option>
				</select>	
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btn_submit" value="Submit"></input>
				<input type="reset" name="btn_reset" value="Reset"></input>
			</td>
			<td></td>
		</tr>
		</table>
<!--- Proses -->
<?php

if (isset($_POST["btn_submit"])) 
	{
		
		$nama_barang_php = $_POST ["txt_nama_barang"];
		$harga_php = $_POST ["txt_harga"];
		$quantity_php = $_POST ["num_quantity"];

		$subtotal = $harga_php*$quantity_php;
		$status = $_POST["rdo_status"];

		if ($status == "pelanggan") {
			$status = "Pelanggan";
			$diskon = 0.1 * $subtotal;
		} else {
			$status = "Bukan Pelanggan";
			$diskon = 0;
		}

		$kota = $_POST["slc_kota"];
		if ($kota == "bandung"	) {

			$ongkir = 10000;

		} else if ($kota == "jakarta") {

			$ongkir = 20000;

		} elseif ($kota == "surabaya") {

			$ongkir = 100000;
		}

		$total = $subtotal - $diskon + $ongkir;	
		
	

?>


		
		<!--output-->

		<table width="30%" align="center"> 
		<tr><th colspan="2"><h2>Data Penjualan</h2></th></tr>
		<tr>
			<td>Nama Barang </td>
			<td><?php echo "$nama_barang_php";?> </td>
		</tr>
		<tr>

			<td>Harga </td>
			<td>Rp. <?php echo "$harga_php";?></td>
		</tr>
		

		<tr>
			<td>Quantity </td>
			<td><?php echo "$quantity_php";?></td>
		</tr>
		<tr>

			<td>Subtotal </td>
			<td>Rp. <?php echo "$subtotal";?> </td>
		</tr>
		<tr>

			<td>Status </td>
			<td><?php echo "$status";?> </td>
		</tr>
		<tr>

			<td>Diskon </td>
			<td>Rp. <?php echo "$diskon";?></input></td>
		</tr>
		<tr>

			<td>Ongkos Kirim </td>
			<td>Rp. <?php echo "$ongkir ($kota)";?></td>
		</tr>
		<tr>

			<td>Total </td>
			<td>Rp. <?php echo "$total";?></td>
		</tr>
		</table>
	<?php } ?>
	</form>










</body>
</html>
