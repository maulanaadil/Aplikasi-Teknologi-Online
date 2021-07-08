<?php
$json = file_get_contents('pegawai.json');
$listPegawai = json_decode($json, true);
foreach ($listPegawai as $pegawai) {
    echo $pegawai["nama"]." berasai dari ".$pegawai["kota"], "<br>";
}

