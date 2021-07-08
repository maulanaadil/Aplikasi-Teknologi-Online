<?php
	$json=file_get_contents("https://api.ayongoding.id/getprovinsi.php");
	echo "JSON yang didapat dari server : <br>";
	echo $json;
