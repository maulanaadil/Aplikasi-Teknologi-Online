<?php
include_once("../../Pertemuan7/function/function.php");
$email=$_GET["email"]; // ambil data dari request
if(filter_var($email,FILTER_VALIDATE_EMAIL)){
	$db=dbConnect();
	$sql="select count(*) banyakdata
	      from pegawai
		  where email='".$db->escape_string($email)."'";
	$res=$db->query($sql);
	$data=$res->fetch_assoc();
	if($data["banyakdata"]>=1)
		echo "ADA";
	else
		echo "TIDAK ADA";
}
else
	echo "ERROR";