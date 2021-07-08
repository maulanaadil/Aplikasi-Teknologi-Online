<?php
include_once("../functions.php");
$kecamatan_id = $_GET["kecamatan_id"]; // ambil data dari request
$db = dbConnect();
$sql = "select kelurahan_id,nama,kode_pos
	  from kelurahan
	  where kecamatan_id='" . $db->escape_string($kecamatan_id) . "'";
$res = $db->query($sql);
$data = $res->fetch_all(MYSQLI_ASSOC);
echo json_encode($data);