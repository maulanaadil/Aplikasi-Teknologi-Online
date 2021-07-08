<?php
	$data=array("jabar" => array("nama"=>"Jawa Barat", "ibukota"=>"Bandung"),
	            "jateng"=> array("nama"=>"Jawa Tengah","ibukota"=>"Semarang"),
				"jatim" => array("nama"=>"Jawa Timur", "ibukota"=>"Surabaya")
			   );
	$json = json_encode($data, JSON_PRETTY_PRINT);
	$byte = file_put_contents('provinsi.json', $json);
	if ($byte==false) {
	    echo "File gagal dibuat";
    }
	echo "File berhasil dibuat sebanyak $byte byte";
