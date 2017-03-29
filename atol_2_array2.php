<head>
	<title>Latihan Array Asosiative</title>
</head>

<body>

	<?php
	
	//Mengisi array asosiative dengan menggunakan konstruktor
		$ibukota=array("jabar"=>"bandung","jateng"=>"semarang","jatim"=>"surabaya","bali"=>"denpasar");
	
	//Mengisi array asosiative dengan menggunakan kurung siku kosong
		$ibukota2["jabar"]="bandung";
		$ibukota2["jateng"]="semarang";
		$ibukota2["jatim"]="surabaya";
		$ibukota2["bali"]="denpasar";
	
	// Memanggil array
		echo $ibukota["jabar"];
		echo "<br><br><br>";
	
	// Memanggil semua element
		foreach ($ibukota as $nilai){
			echo "$nilai <br>";
		}
	
	// Memanggil semua element beserta key indeksnya
		echo "<br><br>";
		foreach ($ibukota as $kota=>$nilai){
			echo "Ibukota dari $kota adalah $nilai <br>";
		}
		
	// Memanggil semua element beserta key indeksnya sebelum diurutkan
		echo "<br><br> Memanggil semua element beserta key indeksnya sebelum diurutkan : <br>";
		foreach ($ibukota as $kota=>$nilai){
			echo "Ibukota dari $kota adalah $nilai <br>";
		}	
	
	// Memanggil semua element beserta key indeksnya sesudah diurutkan berdasarkan nilainya ASC
		echo "<br><br> Memanggil semua element beserta key indeksnya sesudah diurutkan berdasarkan nilainya ASC : <br>";
		asort($ibukota);
		foreach ($ibukota as $kota=>$nilai){
			echo "Ibukota dari $kota adalah $nilai <br>";
		}
	// Memanggil semua element beserta key indeksnya sesudah diurutkan berdasarkan nilainya DSC
		echo "<br><br> Memanggil semua element beserta key indeksnya sesudah diurutkan berdasarkan nilainya DSC : <br>";
		arsort($ibukota);
		foreach ($ibukota as $kota=>$nilai){
			echo "Ibukota dari $kota adalah $nilai <br>";
		}
		
	// Memanggil semua element beserta key indeksnya sesudah diurutkan berdasarkan nilainya ASC
		echo "<br><br> Memanggil semua element beserta key indeksnya sesudah diurutkan berdasarkan key ASC : <br>";
		ksort($ibukota);
		foreach ($ibukota as $kota=>$nilai){
			echo "Ibukota dari $kota adalah $nilai <br>";
		}
		
		// Memanggil semua element beserta key indeksnya sesudah diurutkan berdasarkan nilainya DSC
		echo "<br><br> Memanggil semua element beserta key indeksnya sesudah diurutkan berdasarkan key DSC : <br>";
		krsort($ibukota);
		foreach ($ibukota as $kota=>$nilai){
			echo "Ibukota dari $kota adalah $nilai <br>";
		}
	?>

</body>