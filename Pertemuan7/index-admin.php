<?php
require ('function/function.php');
session_start();
if (!isset($_SESSION["IdPegawai"]))
    header("Location: index.php?error=4");
?>

<!DOCTYPE html>
<html>
<center>
<head>
    <title>Pengelolaan Data</title>
</head>
<body>
<?php banner(); ?>
<?php navigator(); ?>

<h1>Menu Administator</h1>
Selamat Datang <?php echo $_SESSION["NamaDepan"]; ?> <br>
Silahkan pilih aktivitas yang ingin anda lakukan dengan mengklik menu yang ada.
</body>
</center>
</html>

