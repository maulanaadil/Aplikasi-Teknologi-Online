<?php

include_once('./LatihanFunction.php');

$latihan = new LatihanFunction();
echo "Nilai Max array : ".$latihan-> nilaiMax(array(4,2)) ."<br>";
echo "Nilai Min array : ".$latihan-> nilaiMin(array(4,2))."<br>";
echo "Total array : ".$latihan::total(array(33,33))."<br>";

echo $latihan->terbilang(2500000);
