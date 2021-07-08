<?php
include_once('./Nilai.php');

$nilaiAndi = new Nilai();
$nilaiAndi->setNilaiTugas(80);
$nilaiAndi->setNilaiUTS(75);
$nilaiAndi->setNilaiUAS(80);

echo "Nilai Tugas   : " . $nilaiAndi->getNilaiTugas() . "<br>";
echo "Nilai UTS     : " . $nilaiAndi->getNilaiUTS() . "<br>";
echo "Nilai UAS     : " . $nilaiAndi->getNilaiUAS() . "<br>";
echo "Nilai Akhir   : " . $nilaiAndi->getNilaiAkhir() . "<br>";
echo "Indeks Nilai  : " . $nilaiAndi->getIndex();

