<?php include_once("functions.php");?>
<!DOCTYPE html>
<html>
<head><title>Pengelolaan Data</title>
</head>
<body>
<h1>After Submit</h1>
<?php 
if($_POST["tblSubmit"]){
	echo "<pre>";print_r($_POST);echo "</pre>";
	// begin validasi
	$pesansalah="";
	// validasi nama
	$nama=trim($_POST["nama"]);
	if(strlen($nama)==0){
		$pesansalah.="Nama tidak sah. Nama tidak boleh kosong.<br>";
	}
	// validasi tanggal
	$tgl=$_POST["tgl"];
	$bln=$_POST["bln"];
	$thn=$_POST["thn"];
	if(is_numeric($tgl) && is_numeric($bln)&& is_numeric($thn)){
		if(!checkdate($bln,$tgl,$thn))
			$pesansalah="Tanggal tidak valid.<br>";
	}
	else
		$pesansalah.="Tanggal tidak valid karena harus angka semua.<br>";
	// validasi email
	$email=$_POST["email"];
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$pesansalah.= "Format Email Salah.<br>";
	}
	else{
		$db=dbConnect();
		$res=$db->query("SELECT count(*) banyakdata 
						 FROM pegawai 
						 WHERE EMail='".$db->escape_string($email)."'");
		$data=$res->fetch_assoc();
		if($data["banyakdata"]>=1){
			$pesansalah.="Alamat email telah terdaftar.<br>";
		}
	}
	
	// validasi jenis kelamin
	$jk=strtoupper($_POST["jk"]);
	if(($jk!="L")&&($jk!="P"))
		$pesansalah.="Jenis kelamin hanya boleh Laki-laki atau Perempuan.<br>";
	
	// validasi gaji
	$gaji=$_POST["gaji"];
	if(is_numeric($gaji)){
		if(($gaji<2000000) || ($gaji>5000000))
			$pesansalah.="Gaji yang diperbolehkan hanya dari 2jt sampti 5jt.<br>";
	}
	else
		$pesansalah.="Gaji harus berformat angka.<br>";
	
	// validasi status
	$status="";
	if(isset($_POST["status"]))
		$status=strtoupper($_POST["status"]);
	if(!in_array($status,array("T","N","J","D")))
		$pesansalah.="Status tidak valid.<br>";
	
	if($pesansalah==""){
		echo "Tidak terjadi kesalahan. Semua data valid. Data akan disimpan ke database";
		// disini ditulis script untuk simpan data form ke database
	}
	else{
		echo "Terjadi kesalahan sebagai berikut : <br>";
		echo $pesansalah;
		echo "<a href=\"javascript:history.back();\"><button>Kembali Ke Form</button></a>";
	}
	// end validasi
}
else{
	echo "Isi data melalui Form!!!";
}
?>
</body>
</html>