<?php
	$json='{"nama": "Cecep","umur": 20,"kota": "Bandung"}';
	$obj=json_decode($json);
	if(json_last_error()==JSON_ERROR_NONE){
		var_dump($obj);
		echo  "<br>";
		echo "Nama : ".$obj->nama."<br>";
		echo "Umur : ".$obj->umur."<br>";
		echo "Kota : ".$obj->kota;
	}
	else
		echo "JSON Invalid <br> Error Code : ".json_last_error()." : ".json_last_error_msg();
	