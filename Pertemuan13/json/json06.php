<?php
	$data=array("jabar" => array("nama"=>"Jawa Barat", "ibukota"=>"Bandung"),
	            "jateng"=> array("nama"=>"Jawa Tengah","ibukota"=>"Semarang"),
				"jatim" => array("nama"=>"Jawa Timur", "ibukota"=>"Surabaya")
			   );
	$json=json_encode($data,JSON_PRETTY_PRINT);  // konversikan menjadi json
	echo "<pre>";
	echo "JSON :<br>".$json; // tampilkan hasil konversinya
