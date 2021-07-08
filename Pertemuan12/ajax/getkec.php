<?php
include_once("../functions.php");
$kabupaten_kota_id = $_GET["kabupaten_kota_id"]; // ambil data dari request
$db = dbConnect();
$sql = "select kecamatan_id, nama
	  from kecamatan
	  where kabupaten_kota_id='" . $db->escape_string($kabupaten_kota_id) . "'";
$res = $db->query($sql);
$data = $res->fetch_all(MYSQLI_ASSOC);
echo json_encode($data);