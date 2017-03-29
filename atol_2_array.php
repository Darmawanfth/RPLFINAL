<head>
	<title>Latihan Array</title>
</head>

<body>

	<?php
	
	//1. Construktor array
		$kampus=array("Universitas","Komputer","Indonesia");
		
	//2. Menggunakan kurung siku kosong
		$matkul[]="Aplikasi";
		$matkul[]="Teknologi";
		$matkul[]="Online";
	
	//1. Memanggil indeksnya langsung
		
		echo "Memanggil, 1 element array kampus berindeks ke-1 : <b>$kampus[1]</b><br>";
		echo "Memanggil, 1 element array matakuliah berindeks ke-2 : <b>$matkul[2]</b><br>";
	
	//2. Menggunakan Perulangan For
		echo "<br>Memanggil Element array kampus <br>";
		for ($i=0;$i<count($kampus);$i++){
			echo "Element kampus ke-".($i+1)." adalah $kampus[$i] <br>";
		
		}
		
	//3. Menggunakan Perulangan ForEach
		echo "<br>Memanggil Element array kampus <br>";
		foreach ($matkul as $element){
			echo "$element <br>";
		}
		
	//Sorting
		echo "<br>Element array kampus sebelum diurutkan<br>";
		for ($i=0;$i<count($kampus);$i++){
			echo "Element kampus ke-".($i+1)." adalah $kampus[$i] <br>";
		
		}
		
	//Sorting
		echo "<br>Element array kampus setelah diurutkan Asc (A-Z)<br>";
		sort($kampus);
		for ($i=0;$i<count($kampus);$i++){
			echo "Element kampus ke-".($i+1)." adalah $kampus[$i] <br>";
		
		}
	
	//Sorting
		echo "<br>Element array kampus setelah diurutkan Dsc (Z-A)<br>";
		rsort($kampus);
		for ($i=0;$i<count($kampus);$i++){
			echo "Element kampus ke-".($i+1)." adalah $kampus[$i] <br>";
		
		}	
	?>

</body>