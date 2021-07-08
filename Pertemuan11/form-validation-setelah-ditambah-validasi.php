<!DOCTYPE html>
<html>
<head><title>Pengelolaan Data</title>
<script type="text/javascript" language="javascript">
function validasidata(){
	return true;
	var nama=document.f.nama.value.trim();
	if(nama.length==0){
		alert("Nama tidak boleh kosong.");
		document.f.nama.focus();
		return false;
	}
	if((document.f.tgl.selectedIndex>0)&&
	   (document.f.bln.selectedIndex>0)&&
	   (document.f.thn.selectedIndex>0)){
		var tgl=document.f.tgl.selectedIndex;
		var bln=document.f.bln.selectedIndex;
		var thn=document.f.thn.options[document.f.thn.selectedIndex].value;
		var validtanggal=true;
		if((bln==1)||(bln==3)||(bln==5)||(bln==7)||(bln==8)||(bln==10)||(bln==12)){
			if((tgl<1)||(tgl>31))
				validtanggal=false;
		}
		else
		if((bln==4)||(bln==6)||(bln==9)||(bln==11)){
			if((tgl<1)||(tgl>30))
				validtanggal=false;
		}
		else
		if(bln==2){
			if(((thn%100 ==0)&&(thn%400==0))||
				(thn%4 ==0)&&(thn%100!=0)){ // tahun kabisat
				if((tgl<1)||(tgl>29))
					validtanggal=false;
				
			}
			else{ // jika bukan tahun kabisat
				if((tgl<1)||(tgl>28))
					validtanggal=false;
			}
		}
		else
			validtanggal=false;
		if(validtanggal==false){
			alert("Tanggal tidak valid.");
			return false;
		}
	}
	else{
		alert("Tanggal lahir harus dipilih lengkap.");
		return false;
	}
	var email=document.f.email.value.trim();
	var re_email = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i;
	if(!re_email.test(email)){
		alert("Format email tidak valid.");
		document.f.email.focus();
		return false;
	}
	if(document.f.jk.selectedIndex==0){
		alert("Jenis kelamin wajib dipilih.");
		document.f.jk.focus();
		return false;		
	}
	var gaji=parseInt(document.f.gaji.value);
	if(isNaN(gaji)){
		alert("Isilah gaji dalam bentuk angka.");
		document.f.gaji.focus();
		return false;		
	}
	else{ // jika gaji berupa angka
		if((gaji<2000000)||(gaji>5000000)){
			alert("Gaji tidak valid, paling kecil 2jt dan paling besar 5jt.");
			document.f.gaji.focus();
			return false;
		}
	}
	var statusdipilih=false;
	for(var i=0;i<document.f.status.length;i++){
		if(document.f.status[i].checked){// jika slaah satu dichecked
			statusdipilih=true;
		}
	}
	if(!statusdipilih){
		alert("Status tidak boleh dikosongkan. Pilih salah satu.");
		return false;
	}
	return true;
}
</script>
</head>
<body>
<h1>Validasi Form</h1>
<form name="f" method="post" action="aftersubmit.php" onsubmit="return validasidata()">
<table border="1" cellspacing="1px">
<tr><td>Nama</td>
    <td><input type="text" name="nama" size="30" maxlength="50"></td></tr>
<tr><td>Tanggal Lahir</td>
    <td><select name="tgl">
		<option value="">Tanggal</option>
	<?php
		for($i=1;$i<=31;$i++)
			echo "<option value=\"$i\">$i</option>\n";
	?>
	    </select> - 
		<select name="bln">
		<option value="">Bulan</option>
	<?php
		$arBulan=array(1=>"Januari","Februari","Maret","April","Mei","Juni",
		                  "Juli","Agustus","September","Oktober","November","Desember");
		foreach($arBulan as $no=>$nama)
			echo "<option value=\"$no\">$nama</option>\n";
	?>	
		</select> - 
		<select name="thn">
		<option value="">Tahun</option>
	<?php
		for($i=2010;$i>=1930;$i--)
			echo "<option value=\"$i\">$i</option>\n";
	?>	
		</select><span id="errortgl"></span></td></tr>

<tr><td>EMail</td>
    <td><input type="text" name="email" size="25" maxlength="60"></td></tr>
<tr><td>Jenis Kelamin</td>
    <td><select name="jk">
			<option value="">Pilih Jenis Kelamin</option>
			<option value="L">Laki-Laki</option>
			<option value="P">Perempuan</option>
	    </select></td></tr>
<tr><td>Gaji</td>
    <td><input type="text" name="gaji" size="8" maxlength="7"></td></tr>
<tr><td valign="top">Status</td>
    <td><input type="radio" name="status" value="T">Belum Menikah<br>
	    <input type="radio" name="status" value="N">Menikah<br>
	    <input type="radio" name="status" value="J">Janda<br>
	    <input type="radio" name="status" value="D">Duda</td></tr>
<tr><td>Komentar</td>
    <td><textarea cols="40" rows="5" name="komentar"></textarea></td></tr>
<tr><td>&nbsp;</td>
	<td><input type="submit" name="tblSubmit" value="Simpan"></td></tr>
</table>
</form>
</body>
</html>