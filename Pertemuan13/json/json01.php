<?php
	$json='{
			 "nama": "Cecep",
			 "umur": 20,
			 "kota": "Bandung"
		   }';
	@json_decode($json);
	if(json_last_error()==JSON_ERROR_NONE)
		echo "JSON valid";
	else
		echo "JSON Invalid <br> Error Code : ".json_last_error()." : ".json_last_error_msg();
	