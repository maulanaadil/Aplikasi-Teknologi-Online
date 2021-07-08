<!doctype html>
<html>
<body>
Provinsi : <select name="provinsi">
<option value="">Pilih Provinsi</option>
<?php
	$json=file_get_contents("https://api.ayongoding.id/getprovinsi.php");
	$response=json_decode($json,TRUE);
	if($response["status"]=="OK"){
		foreach($response["data"] as $prov){
			echo "<option value=\"".$prov["id_prov"]."\">".$prov["nama"]."</option>\n";
		}
	}
?>
</select>
</body>
</html>