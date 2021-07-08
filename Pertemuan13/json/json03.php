<?php
	$json='{"nama": "Cecep","umur": 20,"kota": "Bandung"}';
	$arr=json_decode($json,TRUE);
	if(json_last_error()==JSON_ERROR_NONE){
		var_dump($arr);
		echo "Nama : ".$arr["nama"]."<br>";
		echo "Umur : ".$arr["umur"]."<br>";
		echo "Kota : ".$arr["kota"];
	}
	else
		echo "JSON Invalid <br> Error Code : ".json_last_error()." : ".json_last_error_msg();
	