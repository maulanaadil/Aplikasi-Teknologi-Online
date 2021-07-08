<?php
include_once("../functions.php");
$provinsi_id=$_GET["provinsi_id"]; // ambil data dari request
$db=dbConnect();
$sql="select kabupaten_kota_id,nama
	  from kabupaten_kota
	  where provinsi_id='".$db->escape_string($provinsi_id)."'";
$res=$db->query($sql);
$data=$res->fetch_all(MYSQLI_ASSOC);
echo json_encode($data);