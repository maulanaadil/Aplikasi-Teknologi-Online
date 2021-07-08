<?php
include_once ('latihan\Show.php');
$show = new Show();
$nim = '50119221';

show::menampilkanDataMahasiswa($nim);
show::tampilkanNama("Adil");
echo "<br>";
echo show::tampilTanggalIndonesia(date("Y-m-d"), false) . "<br>";
echo show:: tampilTanggalIndonesia(date("Y-m-d"));
?>
