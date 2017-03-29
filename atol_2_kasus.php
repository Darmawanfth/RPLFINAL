<!DOCTYPE html>
<html>
<head>
	<title> ATOL 2 Studikasus </title>
</head>
<body>
	<form action="atol_2_php.php" method="post" name="frm_penjualan" target="_self">
	<center>
		<table border =0 width="400">
			<tr bgcolor="#000000">
				<td colspan="3" align="center">
				<b><font color="#FFFFFF">Penjualan Barang</font></b>
				</td>
			</tr>
		
			<tr align="center" bgcolor="CCCCCC">
				<td><b>Nama Barang</b></td>
				<td><b>Harga Barang</b></td>
				<td><b>Qty</b></td>
			</tr>
		
			<tr>
				<td>Buku Tulis</td>
				<td align="right">Rp. 4.000</td>
				<td align="center">
					<input type ="hidden" names="nama[]" value ="Buku Tulis">
					<input type ="hidden" names="harga[]" value =4000>
					<input type ="text" names="qty[]" size="5" maxlength="4">
				</td>
			</tr>
			
			<tr>
				<td>Buku Gambar</td>
				<td align="right">Rp. 5.000</td>
				<td align="center">
					<input type ="hidden" names="nama[]" value ="Buku Gambar">
					<input type ="hidden" names="harga[]" value =5000>
					<input type ="text" names="qty[]" size="5" maxlength="4">

				</td>
			</tr>
			<tr>
				<td>Mouse</td>
				<td align="right">Rp. 20.000</td>
				<td align="center">
					<input type ="hidden" names="nama[]" value ="Mouse">
					<input type ="hidden" names="harga[]" value =20000>
					<input type ="text" names="qty[]" size="5" maxlength="4">
				</td>
			</tr>
			
			<tr>
				<td>Disket</td>
				<td align="right">Rp. 2.500</td>
				<td align="center">
					<input type ="hidden" names="nama[]" value ="Disket">
					<input type ="hidden" names="harga[]" value =2500>
					<input type ="text" names="qty[]" size="5" maxlength="4">
			</td>
			</tr>
			
			<tr bgcolor="99ff33">
				<td colspan="3" align="center">
				<input type="submit" value="hitung" name="submit">
				</td>
			</tr>
		</table>
	</center>
	</form>


</body>
</html>
