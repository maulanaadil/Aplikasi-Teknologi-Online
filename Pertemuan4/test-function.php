<?php
include_once('latihan\function.php');

$latihan = new Latihan1();

echo $latihan::tampilTanggalIndonesia(date('Y-m-d')) . "<br>";
echo tampilTanggalIndonesia(date('Y-m-d'), false) . "<br>";
tampilkanNama("Maulana adil");
echo tampilJam();
?>