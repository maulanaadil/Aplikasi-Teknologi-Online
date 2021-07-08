<!DOCTYPE html>
<html>
<head><title>Signup</title></head>
<body>
<script>
function cekEMail(){
	var email=document.f.email.value.trim();
	var re_email = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i;
	var status=document.getElementById("statusemail");
	status.style.visibility="visible";	
	if(re_email.test(email)){ // jika email, cek ke database
		var xhr=new XMLHttpRequest();
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				response = xhr.responseText;
				document.f.statusemail.value=response;
				if(response=="ERROR"){
					status.innerHTML="Format email salah.";
					document.f.email.style.backgroundColor="#FFE4E1";
				}
				else if(response=="ADA"){
					status.innerHTML="Account email sudah ada.";
					document.f.email.style.backgroundColor="yellow";
				}
				else if(response=="TIDAK ADA"){
					status.innerHTML="Account email OK, belum ada yang menggunakan.";
					document.f.email.style.backgroundColor="#00FA9A";
				}
			}
		};
		xhr.open("GET", "getstatusemail.php?email="+email, true);
		xhr.send();
	}
	else{
		status.innerHTML="Format EMail Salah";
		document.f.email.style.backgroundColor="yellow";
	}
}
function validasidata(){
	var nama=document.f.nama.value.trim();
	if(nama.length==0){
		alert("Nama tidak boleh kosong.");
		document.f.nama.focus();
		return false;
	}
	var email=document.f.email.value.trim();
	var re_email = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i;
	if(!re_email.test(email)){
		alert("Format email tidak valid.");
		document.f.email.focus();
		return false;
	}
	if(document.f.statusemail.value!="TIDAK ADA"){
		alert("Format email tidak valid atau email sudah terdaftar.");
		document.f.email.focus();
		return false;
	}
	var pass1=document.f.pass1.value.trim();
	var pass2=document.f.pass2.value.trim();
	if((pass1.length<8)||(pass2.length<8)||(pass1!=pass2)){
		alert("Password dan ulangi password harus sama dan paling pendek 8 karakter.");
		document.f.pass2.focus();
		return false;
	}
	return true;
}
</script>
<h1>Pendaftaran</h1>
<form name="f" action="dosignup.php" method="POST" onsubmit="return validasidata()">
<input type="hidden" name="statusemail" value="">
<table border="1">
<tr><td>Nama</td><td><input type="text" name="nama" size="30"></td></tr>
<tr><td>EMail</td>
    <td><input type="text" name="email" onblur="cekEMail()" size="50">
	    <span id="statusemail" style="visibility:hidden"></span></td></tr>
<tr><td>Password</td><td><input type="password" name="pass1"></tr></tr>
<tr><td>Ulangi Password</td><td><input type="password" name="pass2"></tr></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="tblSubmit" value="Sign Up"></td></tr>
</table>
</form>
</body>
</html>