<?php

$angka = array(6, 4, 1, 3, 5);

echo "Sebelum menggunakan function: <pre>".print_r($angka, true)."</pre>";
sort($angka);
echo "Setelah di sort: <pre>".print_r($angka, true)."</pre>";
rsort($angka);
echo "Setelah di reverse sort: <pre>".print_r($angka, true)."</pre>";



echo "<hr>";

$ibuKota = array(
    "JawaBarat" => "Bandung",
    "JawaTimur" => "Surabaya",
    "JawaTengah" => "Semarang",
    "Bali" => "Denpasar",
    "Banten" => "Serang"
);

for ($i = 0; $i < count($angka); $i++) {
    echo $angka[$i] . "<br>";
}

echo "Hanya mengambil Value saja: <br>";
foreach ($ibuKota as $kota) {
    echo $kota."<br>";
}
echo "<br>";


//echo  "Mengambil Value dan Key: <br>";
//foreach ($ibuKota as $key => $kota) {
//    echo "Ibukota $key adalah $kota <br>";
//}

echo count($ibuKota);

$ibuKota["Papua"] = "Jayapura";
echo  "Mengambil Value dan Key: <br>";
foreach ($ibuKota as $key => $kota) {
    echo "Ibukota $key adalah $kota <br>";
}

echo array_search("Jayapura", $ibuKota) ."<br>";

if (array_key_exists("Bali", $ibuKota)) {
    echo "The element(Bali) has already added in array<br>";
}

if (in_array("Bandung", $ibuKota)) {
    echo "The element(Bandung) has already added in array<br>";
}

if (array_search("Jakarta", $ibuKota) == true) {
    echo "The element(Surabaya) has already added in array<br>";
} else {
    echo "The element has NOT already add in array<br>";
}

echo "<hr>";
// Function
asort($ibuKota);
echo "Data yang sudah diurutkan (Asort) : <pre>".print_r($ibuKota, true)."</pre>";
arsort($ibuKota);
echo "Data yang sudah diurutkan (Arsort) : <pre>".print_r($ibuKota, true)."</pre>";
ksort($ibuKota);
echo "Data yang sudah diurutkan(Ksort) : <pre>".print_r($ibuKota, true)."</pre>";

echo "<hr>";
// Array Multidimensi

$jarak=array(array(0,0,4,0,7),// baris 0
    array(0,0,0,6,0),// baris 1
    array(4,0,0,0,5),// baris 2
    array(0,10,0,0,0),// baris 3
    array(7,0,5,0,0)// baris 4
);
echo "Jarak dari 2 ke 4 : ".$jarak[2][4] ."<br>";


$provinsi = array(
    "jabar" => array("nama"=> "JawaBarat" , "ibuKota"=>"Bandung"),
    "jatim" => array("nama"=> "JawaTimur" , "ibuKota"=>"Surabaya"),
    "jateng" => array("nama"=> "JawaTengah" , "ibuKota"=>"Semarang"),
    "bali" => array("nama"=> "Bali" , "ibuKota"=>"Denpasar")
);

echo $provinsi["jabar"]["nama"]." dengan IbuKota di ".$provinsi["jabar"]["ibuKota"];
?>
