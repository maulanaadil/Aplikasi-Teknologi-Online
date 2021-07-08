<!DOCTYPE html>
<html>
<head><title>Pengelolaan Data</title>
</head>
<body>
<h1>Validasi Form</h1>
<form name="f" method="post" action="aftersubmit.php">
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
		</select></td></tr>

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