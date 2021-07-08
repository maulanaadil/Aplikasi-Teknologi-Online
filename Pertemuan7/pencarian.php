<?php include_once("functions.php");?>
<!DOCTYPE html>
<html>
<head>
<title>Pencarian data produk</title>
</head>
<body>
<h1>Pencarian Produk</h1>
<form method="post">
<table>
<tr><td>Dicari</td>
    <td><input type="text" width="20" name="dicari" value="<?php echo isset($_POST["dicari"])?$_POST["dicari"]:"";?>"></td>
    <td><input type="submit" name="TblCari" value="Cari"></tr>
</table>
</form>
<?php
	if(isset($_POST["TblCari"])){
$db=dbConnect();
if($db->connect_errno==0){
	$dicari=$db->escape_string($_POST["dicari"]);
	$sql="select IdProduk, Nama, HargaJual Harga, Deskripsi
		  from produk where nama like '%$dicari%' or deskripsi like '%$dicari%'";
	$res=$db->query($sql);
	if($res){ // eksekusi sql sukses
		?>
		<?php
		$data=$res->fetch_all(); // ambil seluruh baris data
		foreach($data as $barisdata){ // telusuri satu per satu
			?>
			<div style="border:1px black solid;margin:5px;padding:10px">
			<div><?php echo $barisdata[1]." (".$barisdata[0].")";?></div>
			<div><?php echo "Rp. ".number_format($barisdata[2],0,",",".");?></div>
			<hr noshade color="black">
			<div><?php echo $barisdata[3];?></div>
			</div>
			<?php
		}
		$res->free();
	}else
		echo "Gagal Eksekusi SQL".(DEVELOPMENT?" : ".$db->error:"")."<br>";
}
else
	echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
	}
	else
		echo "Isilah keyword pencarian untuk melakukan pencarian.";
?>
</body>
</html>
