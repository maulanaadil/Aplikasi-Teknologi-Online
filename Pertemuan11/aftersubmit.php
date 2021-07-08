<!DOCTYPE html>
<html>
<head><title>Pengelolaan Data</title>
</head>
<body>
<h1>After Submit</h1>
<?php
	if($_POST["tblSubmit"]){
?>
Data yang didapat dari Form
<pre>
<?php
    print_r($_POST);
?>
</pre>    
<?php
} 
else{
    echo "Isi data melalui Form!!!";
}
?>
</body>
</html> 
